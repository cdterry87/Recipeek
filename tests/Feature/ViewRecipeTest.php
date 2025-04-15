<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Recipe;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewRecipeTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_recipe_page_renders_correctly()
    {
        // Create the owner of a recipe
        $owner = User::factory()->create();

        // Create a user who is not the owner of the recipe
        $user = User::factory()->create();

        // Create a private recipe
        $privateRecipe = Recipe::factory()->create([
            'user_id' => $owner->id,
            'public' => false,
        ]);

        // Create a public recipe
        $publicRecipe = Recipe::factory()->create([
            'user_id' => $owner->id,
            'public' => true,
        ]);

        // Test that a non-owner user can view a public recipe
        $this->actingAs($user)
            ->get(route('view-recipe', $publicRecipe->slug))
            ->assertStatus(200)
            ->assertSee($publicRecipe->title)
            ->assertSee('save-button')
            ->assertSee('print-button')
            ->assertSee('share-button')
            ->assertDontSee('edit-button');

        // Test that a non-owner user cannot view a private recipe
        $this->actingAs($user)
            ->get(route('view-recipe', $privateRecipe->slug))
            ->assertSee('private-recipe');
    }

    public function test_user_can_save_and_unsave_recipe()
    {
        $user = User::factory()->create();

        $recipe = Recipe::factory()->create([
            'public' => true,
        ]);

        // Test user saving a recipe unauthenticated
        Livewire::test('view-recipe', [
            'recipe' => $recipe,
        ])
            ->assertStatus(200)
            ->assertSee($recipe->title)
            ->assertSee('x-save-button')
            ->assertDontSee('x-unsave-button')
            ->call('save')
            ->assertRedirect(route('login'));

        // Test user saving a recipe authenticated
        $this->actingAs($user);

        Livewire::test('view-recipe', [
            'recipe' => $recipe,
        ])
            ->assertStatus(200)
            ->assertSee($recipe->title)
            ->assertSee('x-save-button')
            ->assertDontSee('x-unsave-button')
            ->call('save')
            ->assertHasNoErrors();

        // Check if the recipe is saved
        $this->assertDatabaseHas('recipes_saves', [
            'user_id' => $user->id,
            'recipe_id' => $recipe->id,
        ]);

        Livewire::test('view-recipe', [
            'recipe' => $recipe,
        ])
            ->assertStatus(200)
            ->assertSee($recipe->title)
            ->assertSee('x-unsave-button')
            ->assertDontSee('x-save-button')
            ->call('unsave')
            ->assertHasNoErrors();

        // Check if the recipe is unsaved
        $this->assertDatabaseMissing('recipes_saves', [
            'user_id' => $user->id,
            'recipe_id' => $recipe->id,
        ]);
    }

    public function test_owner_can_edit_recipe()
    {
        // Create the owner of a recipe
        $owner = User::factory()->create();

        // Create a public recipe
        $recipe = Recipe::factory()->create([
            'user_id' => $owner->id,
            'public' => true,
        ]);

        // Test that the owner can view their own private recipe
        $this->actingAs($owner);

        Livewire::test('view-recipe', [
            'recipe' => $recipe,
        ])
            ->assertStatus(200)
            ->assertSee($recipe->title)
            ->assertSee('edit-button')
            ->assertDontSee('save-button')
            ->call('edit')
            ->assertRedirect(route('edit-recipe', $recipe->uuid));
    }

    public function test_print_recipe()
    {
        $recipe = Recipe::factory()->create([
            'public' => true,
        ]);

        Livewire::test('view-recipe', [
            'recipe' => $recipe,
        ])
            ->assertStatus(200)
            ->assertSee($recipe->title)
            ->assertSee('print-button')
            ->call('printRecipe')
            ->assertHasNoErrors();
    }
}
