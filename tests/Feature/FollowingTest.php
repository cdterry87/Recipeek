<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\UserFollower;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FollowingTest extends TestCase
{
    use RefreshDatabase;

    public function test_following_page_renders_correctly()
    {
        // Create a user
        $user = User::factory()->create();
        $userToFollow = User::factory()->create();

        // Try to access the page unauthenticated and assert redirect to login
        $response = $this->get(route('following'));
        $response->assertRedirect('/login');

        // Try to access the page as an authenticated user and assert 200 status with no users shown
        $this->actingAs($user);
        $response = $this->get(route('following'));
        $response->assertStatus(200);
        $response->assertSee('Following');
        $response->assertSee('no-users');

        // Simulate following a user
        UserFollower::create([
            'user_id' => $userToFollow->id,
            'follower_id' => $user->id,
        ]);

        Livewire::test('following')
            ->assertStatus(200)
            ->assertSee('1 Result')
            ->assertSee($userToFollow->name);
    }

    public function test_view_user()
    {
        // Create a user
        $user = User::factory()->create();
        $userToFollow = User::factory()->create();

        // Simulate following a user
        UserFollower::create([
            'user_id' => $userToFollow->id,
            'follower_id' => $user->id,
        ]);

        $this->actingAs($user);

        Livewire::test('following')
            ->assertStatus(200)
            ->call('view', $userToFollow->id)
            ->assertRedirect(route('view-creator', [
                'creator' => $userToFollow->slug,
            ]));
    }

    public function test_unfollow_user()
    {
        // Create a user
        $user = User::factory()->create();
        $userToFollow = User::factory()->create();

        // Simulate following a user
        UserFollower::create([
            'user_id' => $userToFollow->id,
            'follower_id' => $user->id,
        ]);

        $this->actingAs($user);

        Livewire::test('following')
            ->assertStatus(200)
            ->call('unfollow', $userToFollow->id)
            ->assertHasNoErrors();

        // Assert that the user is no longer followed
        $this->assertDatabaseMissing('users_followers', [
            'user_id' => $userToFollow->id,
            'follower_id' => $user->id,
        ]);
    }
}
