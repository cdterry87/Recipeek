<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Recipe;
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
}
