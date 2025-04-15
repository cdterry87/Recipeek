<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\UserFriendRequest;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FriendRequestsTest extends TestCase
{
    use RefreshDatabase;

    public function test_friend_requests_page_renders_correctly()
    {
        // Try to access the page unauthenticated and assert redirect to login
        $response = $this->get(route('friend-requests'));
        $response->assertRedirect('/login');

        // Create a user, authenticate the user, access the page again and assert 200
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get(route('friend-requests'));
        $response->assertStatus(200);

        // Assert the view contains the expected elements
        $response->assertSee('View Friends');
        $response->assertSee('Friend Requests');
        $response->assertSee('Received');
        $response->assertSee('Sent');
        $response->assertSee('no-users');

        // Add a friend request
        $friend = User::factory()->create();
        UserFriendRequest::create([
            'from_user_id' => $friend->id,
            'to_user_id' => $user->id, // Receive friend request
        ]);
    }

    public function test_toggle_sent_requests()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Livewire::test('friend-requests')
            ->assertSet('areSentRequestsShown', false)
            ->call('showSentRequests')
            ->assertSet('areSentRequestsShown', true)
            ->call('showReceivedRequests')
            ->assertSet('areSentRequestsShown', false);
    }

    public function test_show_friends()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Livewire::test('friend-requests')
            ->call('showFriends')
            ->assertRedirect(route('friends'));
    }

    public function test_accept_friend_request()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        // Add a friend request
        $friend = User::factory()->create();
        UserFriendRequest::create([
            'from_user_id' => $friend->id,
            'to_user_id' => $user->id, // Receive friend request
        ]);

        Livewire::test('friend-requests')
            ->call('acceptFriendRequest', $friend->id)
            ->assertHasNoErrors();

        // Assert the friend request is accepted
        $this->assertDatabaseHas('users_friends', [
            'user_id' => $user->id,
            'friend_id' => $friend->id,
        ]);
        $this->assertDatabaseHas('users_friends', [
            'user_id' => $friend->id,
            'friend_id' => $user->id,
        ]);

        // Assert the friend request is deleted
        $this->assertDatabaseMissing('users_friend_requests', [
            'from_user_id' => $friend->id,
            'to_user_id' => $user->id,
        ]);
    }

    public function test_reject_friend_request()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        // Add a friend request
        $friend = User::factory()->create();
        UserFriendRequest::create([
            'from_user_id' => $friend->id,
            'to_user_id' => $user->id, // Receive friend request
        ]);

        Livewire::test('friend-requests')
            ->call('rejectFriendRequest', $friend->id)
            ->assertHasNoErrors();

        // Assert the friend request is rejected
        $this->assertDatabaseMissing('users_friends', [
            'user_id' => $user->id,
            'friend_id' => $friend->id,
        ]);
        $this->assertDatabaseMissing('users_friends', [
            'user_id' => $friend->id,
            'friend_id' => $user->id,
        ]);

        // Assert the friend request is rejected
        $this->assertDatabaseMissing('users_friend_requests', [
            'from_user_id' => $friend->id,
            'to_user_id' => $user->id,
        ]);
    }

    public function test_cancel_friend_request()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        // Send a friend request
        $friend = User::factory()->create();
        UserFriendRequest::create([
            'from_user_id' => $user->id, // Send the request from the user
            'to_user_id' => $friend->id,
        ]);

        Livewire::test('friend-requests')
            ->call('cancelFriendRequest', $friend->id)
            ->assertHasNoErrors();

        // Assert the friend request is cancelled
        $this->assertDatabaseMissing('users_friend_requests', [
            'from_user_id' => $user->id,
            'to_user_id' => $friend->id,
        ]);
    }

    public function test_view_friend()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $friend = User::factory()->create();
        UserFriendRequest::create([
            'from_user_id' => $friend->id,
            'to_user_id' => $user->id,
        ]);

        Livewire::test('friend-requests')
            ->call('viewFriend', $friend->id)
            ->assertRedirect(route('view-creator', [
                'creator' => $friend,
            ]));
    }
}
