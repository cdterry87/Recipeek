<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Recipe;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewCreatorTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_creator_page_renders_correctly()
    {
        $user = User::factory()->create();
        $privateCreator = User::factory()->create([
            'public' => false,
        ]);
        $publicCreator = User::factory()->create([
            'public' => true,
        ]);

        // View the private creator page and assertSee private-creator
        $this->get(route('view-creator', $privateCreator->slug))
            ->assertStatus(200)
            ->assertSee('private-creator')
            ->assertDontSee($privateCreator->name);

        // View the public creator page (unauthenticated)
        $this->get(route('view-creator', $publicCreator->slug))
            ->assertStatus(200)
            ->assertSee($publicCreator->name)
            ->assertDontSee('private-creator')
            ->assertDontSee('x-follow-button') // Should not see buttons if unauthenticated
            ->assertDontSee('x-send-friend-request-button')
            ->assertSee('no-recipes'); // No recipes have been added for this user yet

        // Login as user
        $this->actingAs($user);

        // Add some public recipes to the public creator
        Recipe::factory()->create([
            'user_id' => $publicCreator->id,
            'public' => true,
        ]);

        // View the public creator page (authenticated)
        $this->get(route('view-creator', $publicCreator->slug))
            ->assertStatus(200)
            ->assertSee($publicCreator->name)
            ->assertDontSee('private-creator')
            ->assertSee('x-follow-button') // Should see buttons if authenticated
            ->assertSee('x-send-friend-request-button')
            ->assertDontSee('no-recipes'); // Recipes should be visible now
    }

    public function test_follow_and_unfollow_creator()
    {
        $user = User::factory()->create();
        $publicCreator = User::factory()->create([
            'public' => true,
        ]);

        // Login as user
        $this->actingAs($user);

        // View creator page
        Livewire::test('view-creator', [
            'creator' => $publicCreator
        ])
            ->assertStatus(200)
            ->assertSee($publicCreator->name)
            ->assertSet('isFollowing', false)
            ->assertSee('x-follow-button')
            ->assertDontSee('x-unfollow-button')
            ->call('follow')
            ->assertHasNoErrors()
            ->assertSet('isFollowing', true);

        // Assert following entry was made
        $this->assertDatabaseHas('users_followers', [
            'user_id' => $publicCreator->id,
            'follower_id' => $user->id,
        ]);

        // View creator page again after following
        Livewire::test('view-creator', [
            'creator' => $publicCreator
        ])
            ->assertStatus(200)
            ->assertSee($publicCreator->name)
            ->assertSet('isFollowing', true)
            ->assertDontSee('x-follow-button')
            ->assertSee('x-unfollow-button')
            ->call('unfollow')
            ->assertHasNoErrors()
            ->assertSet('isFollowing', false);

        // Assert following entry was removed
        $this->assertDatabaseMissing('users_followers', [
            'user_id' => $publicCreator->id,
            'follower_id' => $user->id,
        ]);
    }

    public function test_send_and_cancel_friend_request_to_creator()
    {
        $user = User::factory()->create();
        $publicCreator = User::factory()->create([
            'public' => true,
        ]);

        // Login as user
        $this->actingAs($user);

        // View creator page
        Livewire::test('view-creator', [
            'creator' => $publicCreator
        ])
            ->assertStatus(200)
            ->assertSee($publicCreator->name)
            ->assertSet('isFriendRequestSent', false)
            ->assertSee('x-send-friend-request-button')
            ->assertDontSee('x-cancel-friend-request-button')
            ->call('sendFriendRequest')
            ->assertHasNoErrors()
            ->assertSet('isFriendRequestSent', true);

        // Assert following entry was made
        $this->assertDatabaseHas('users_friend_requests', [
            'from_user_id' => $user->id,
            'to_user_id' => $publicCreator->id,
        ]);

        // View creator page again after sending friend request
        Livewire::test('view-creator', [
            'creator' => $publicCreator
        ])
            ->assertStatus(200)
            ->assertSee($publicCreator->name)
            ->assertSet('isFriendRequestSent', true)
            ->assertDontSee('x-send-friend-request-button')
            ->assertSee('x-cancel-friend-request-button')
            ->call('cancelFriendRequest')
            ->assertHasNoErrors()
            ->assertSet('isFriendRequestSent', false);

        // Assert following entry was removed
        $this->assertDatabaseMissing('users_friend_requests', [
            'from_user_id' => $user->id,
            'to_user_id' => $publicCreator->id,
        ]);
    }

    public function test_sorting_and_filtering_works_correctly()
    {
        $user = User::factory()->create();

        // Create some recipes
        Recipe::factory()->count(3)->create([
            'public' => true,
            'user_id' => $user->id,
        ]);

        // Create a chicken recipe
        Recipe::factory()->create([
            'title' => 'Chicken Curry',
            'description' => 'A spicy chicken curry recipe.',
            'category' => 'Dinner',
            'cuisine' => 'Indian',
            'difficulty' => 'Normal',
            'method' => 'Stovetop',
            'occasion' => 'Everyday',
            'hours' => 0,
            'minutes' => 45,
            'public' => true,
            'user_id' => $user->id,
        ]);

        Livewire::test('view-creator', [
            'creator' => $user
        ])
            ->set('search', 'Chicken')
            ->set('category', 'Dinner')
            ->set('cuisine', 'Indian')
            ->set('difficulty', 'Normal')
            ->set('method', 'Stovetop')
            ->set('occasion', 'Everyday')
            ->set('time', 'Normal')
            ->set('sort_by', 'cook_time')
            ->assertSee('Chicken Curry')
            ->assertSee('1 Result')
            ->assertDontSee('no-recipes')
            ->call('resetFilters')
            ->assertSee('4 Results');
    }
}
