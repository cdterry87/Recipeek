<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Recipe;
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
}
