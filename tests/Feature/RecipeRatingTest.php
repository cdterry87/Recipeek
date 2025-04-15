<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Recipe;
use Livewire\Livewire;
use App\Models\RecipeSave;
use App\Models\RecipeRating;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RecipeRatingTest extends TestCase
{
    use RefreshDatabase;

    public function test_recipe_rating_renders_correctly()
    {
        $user = User::factory()->create();
        $recipe = Recipe::factory()->create();

        // View the recipe rating component (unauthenticated with no other details)
        Livewire::test('recipe-rating', [
            'recipe' => $recipe,
        ])
            ->assertSee('Login to rate this recipe')
            ->assertSee('(0.0)')
            ->assertSee('0 ratings')
            ->assertSee('0 saves');

        // Login as user
        $this->actingAs($user);

        // Add a rating from this user
        RecipeRating::create([
            'user_id' => $user->id,
            'recipe_id' => $recipe->id,
            'rating' => 4,
        ]);

        // Add a save from this user
        RecipeSave::create([
            'user_id' => $user->id,
            'recipe_id' => $recipe->id,
        ]);

        // View the recipe rating component (authenticated including other details)
        Livewire::test('recipe-rating', [
            'recipe' => $recipe
        ])
            ->assertSee('Click to rate this recipe')
            ->assertSee('(4.0)')
            ->assertSee('1 ratings')
            ->assertSee('1 saves');
    }

    public function test_rating_recipe_works_correctly()
    {
        $user = User::factory()->create();
        $recipe = Recipe::factory()->create();

        $this->actingAs($user);

        Livewire::test('recipe-rating', [
            'recipe' => $recipe,
        ])
            ->assertSee('Click to rate this recipe')
            ->assertSee('(0.0)')
            ->assertSee('0 ratings')
            ->set('rating', 4)
            ->call('rate')
            ->assertSee('(4.0)')
            ->assertSee('1 ratings');
    }
}
