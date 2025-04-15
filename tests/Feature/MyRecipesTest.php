<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Recipe;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MyRecipesTest extends TestCase
{
    use RefreshDatabase;

    public function test_my_recipes_page_renders_correctly()
    {
        // Try to access the page unauthenticated and assert redirect to login
        $response = $this->get(route('my-recipes'));
        $response->assertRedirect('/login');

        // Create a user, authenticate the user, access the page again and assert 200
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get(route('my-recipes'));
        $response->assertStatus(200);
        $response->assertSee('My Recipes');
        $response->assertSee('New Recipe');
        $response->assertSee('no-recipes');

        // Create a recipe for the user
        $recipe = Recipe::factory()->create([
            'user_id' => $user->id,
        ]);

        // Assert the view contains the recipe's title
        $response = $this->get(route('my-recipes'));
        $response->assertStatus(200);
        $response->assertSee($recipe->title);
        $response->assertDontSee('no-recipes');
    }

    public function test_sorting_and_filtering_works_correctly()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create some recipes
        Recipe::factory()->count(3)->create([
            'public' => true,
            'user_id' => $user->id
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
            'user_id' => $user->id
        ]);

        Livewire::test('my-recipes')
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
