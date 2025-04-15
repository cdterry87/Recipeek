<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\UserFriend;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

class PrivateFriendRequestTest extends TestCase
{
    use RefreshDatabase;

    public function test_private_friend_request_page_renders_correctly()
    {
        $user = User::factory()->create();
        $friend = User::factory()->create();

        // Try to access the page unauthenticated and assert redirect to login
        $response = $this->get(route('private-friend-request', ['private_friend_request_id' => $friend->private_friend_request_id]));
        $response->assertRedirect('/login');

        // Create a user, authenticate the user, access the page again and assert 200
        $this->actingAs($user);
        $response = $this->get(route('private-friend-request', ['private_friend_request_id' => $friend->private_friend_request_id]));
        $response->assertStatus(200);
        $response->assertSee('Send Friend Request');
        $response->assertSee($friend->name);
    }

    public function test_send_friend_request_works_correctly()
    {
        $user = User::factory()->create();
        $friend = User::factory()->create();

        // Authenticate the user
        $this->actingAs($user);

        Livewire::test('private-friend-request', [
            'private_friend_request_id' => $friend->private_friend_request_id,
        ])
            ->assertStatus(200)
            ->assertSee('send-friend-request-button')
            ->assertSet('isFriendRequestSent', false)
            ->assertSet('isAlreadyFriend', false)
            ->assertSet('isCurrentUser', false)
            ->call('sendFriendRequest')
            ->assertHasNoErrors()
            ->assertSet('isFriendRequestSent', true)
            ->assertSet('isAlreadyFriend', false)
            ->assertSet('isCurrentUser', false);

        // Assert friend request was sent
        $this->assertDatabaseHas('users_friend_requests', [
            'from_user_id' => $user->id,
            'to_user_id' => $friend->id,
        ]);
    }

    public function test_users_are_already_friends()
    {
        $user = User::factory()->create();
        $friend = User::factory()->create();

        // Add users as friends
        UserFriend::create([
            'user_id' => $user->id,
            'friend_id' => $friend->id,
        ]);
        UserFriend::create([
            'user_id' => $friend->id,
            'friend_id' => $user->id,
        ]);

        // Authenticate the user
        $this->actingAs($user);

        Livewire::test('private-friend-request', [
            'private_friend_request_id' => $friend->private_friend_request_id,
        ])
            ->assertStatus(200)
            ->assertDontSee('send-friend-request-button')
            ->assertSet('isAlreadyFriend', true);
    }

    public function test_user_viewing_own_private_friend_request_page()
    {
        $user = User::factory()->create();

        // Authenticate the user
        $this->actingAs($user);

        Livewire::test('private-friend-request', [
            'private_friend_request_id' => $user->private_friend_request_id,
        ])
            ->assertStatus(200)
            ->assertDontSee('send-friend-request-button')
            ->assertSet('isCurrentUser', true);
    }
}
