<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\UserFriend;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FriendsTest extends TestCase
{
    use RefreshDatabase;

    public function test_friends_page_renders_correctly()
    {
        // Try to access the page unauthenticated and assert redirect to login
        $response = $this->get(route('friends'));
        $response->assertRedirect('/login');

        // Create a user, authenticate the user, access the page again and assert 200
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get(route('friends'));
        $response->assertStatus(200);
        $response->assertSee('Friends');
        $response->assertSee('Friend Requests');
        $response->assertSee('no-users');

        $friend = User::factory()->create([
            'name' => 'John Doe',
        ]);

        // Add friend
        UserFriend::create([
            'user_id' => $user->id,
            'friend_id' => $friend->id,
            'accepted_at' => now(),
        ]);
        UserFriend::create([
            'user_id' => $friend->id,
            'friend_id' => $user->id,
            'accepted_at' => now(),
        ]);

        // Assert the view contains the friend's name
        $response = $this->get(route('friends'));
        $response->assertStatus(200);
        $response->assertSee($friend->name);
        $response->assertDontSee('no-users');

        Livewire::test('friends')
            ->set('search', 'kdsljfksdjflsdfklf')
            ->assertSee('no-users')
            ->call('resetFilters')
            ->assertDontSee('no-users');
    }

    public function test_show_friend_requests_works_correctly()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Livewire::test('friends')
            ->call('showFriendRequests')
            ->assertRedirect(route('friend-requests'));
    }

    public function test_remove_friend_works_correctly()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $friend = User::factory()->create();

        // Add friend
        UserFriend::create([
            'user_id' => $user->id,
            'friend_id' => $friend->id,
            'accepted_at' => now(),
        ]);
        UserFriend::create([
            'user_id' => $friend->id,
            'friend_id' => $user->id,
            'accepted_at' => now(),
        ]);

        Livewire::test('friends')
            ->call('removeFriend', $friend->id)
            ->assertHasNoErrors();

        // Assert the friend is removed
        $this->assertDatabaseMissing('users_friends', [
            'user_id' => $user->id,
            'friend_id' => $friend->id,
        ]);
        $this->assertDatabaseMissing('users_friends', [
            'user_id' => $friend->id,
            'friend_id' => $user->id,
        ]);
    }

    public function test_view_friend()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $friend = User::factory()->create();

        // Add friend
        UserFriend::create([
            'user_id' => $user->id,
            'friend_id' => $friend->id,
            'accepted_at' => now(),
        ]);
        UserFriend::create([
            'user_id' => $friend->id,
            'friend_id' => $user->id,
            'accepted_at' => now(),
        ]);

        Livewire::test('friends')
            ->call('viewFriend', $friend->id)
            ->assertRedirect(route('view-creator', [
                'creator' => $friend,
            ]));
    }
}
