<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Recipe;
use Livewire\Livewire;
use App\Enums\RecipeSortBy;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DiscoverRecipesTest extends TestCase
{
    use RefreshDatabase;

    public function test_discover_recipes_page_renders_correctly()
    {
        // Make sure page renders correctly
        $response = $this->get(route('discover-recipes'));
        $response->assertStatus(200);
        $response->assertSee('Discover Recipes');

        // Initially there are no recipes
        $response->assertSee('no-recipes');

        // Create some recipes
        Recipe::factory()->count(3)->create();

        // Check that the recipes are displayed
        $response = $this->get(route('discover-recipes'));
        $response->assertStatus(200);

        // Check that the recipes are displayed
        $response->assertSee('recipe-card');
        $response->assertSee('3 Results');
    }

    public function test_sorting_and_filtering_works_correctly()
    {
        // Create some recipes
        Recipe::factory()->count(3)->create([
            'public' => true
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
            'public' => true
        ]);

        Livewire::test('discover-recipes')
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
