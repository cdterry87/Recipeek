<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Recipe;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EditRecipeTest extends TestCase
{
    use RefreshDatabase;

    public function test_edit_recipe_page_renders_correctly()
    {
        // Create a user and recipe
        $recipeOwner = User::factory()->create();
        $otherUser = User::factory()->create();
        $recipe = Recipe::factory()->create([
            'user_id' => $recipeOwner->id,
        ]);

        // Try to access the page unauthenticated and assert redirect to login
        $response = $this->get(route('edit-recipe', [
            'uuid' => $recipe->uuid,
        ]));
        $response->assertRedirect('/login');

        // Try to access the page as another user and assert redirect to login
        $this->actingAs($otherUser);
        $response = $this->get(route('edit-recipe', [
            'uuid' => $recipe->uuid,
        ]));
        $response->assertRedirect(route('view-recipe', [
            'recipe' => $recipe->slug,
        ]));

        // Try to access the page as the recipe owner and assert 200 status
        $this->actingAs($recipeOwner);
        $response = $this->get(route('edit-recipe', [
            'uuid' => $recipe->uuid,
        ]));
        $response->assertStatus(200);
        $response->assertSee('Edit Recipe');
        $response->assertSee('View Recipe');
        $response->assertSee('Save Recipe');
        $response->assertSee('Recipe Details');
        $response->assertSee('Add Ingredients');
        $response->assertSee('Add Instructions');
        $response->assertSee('Delete Recipe');
    }

    public function test_edit_recipe_form_submits_correctly()
    {
        // Create a user and recipe
        $recipeOwner = User::factory()->create();
        $recipe = Recipe::factory()->create([
            'user_id' => $recipeOwner->id,
        ]);

        $this->actingAs($recipeOwner);

        // Update recipe
        Livewire::test('edit-recipe', [
            'uuid' => $recipe->uuid,
        ])
            ->assertSet('uuid', $recipe->uuid)
            ->assertSet('recipeId', $recipe->id)
            ->assertSet('slug', $recipe->slug)
            ->assertSet('title', $recipe->title)
            ->assertSet('description', $recipe->description)
            ->assertSet('category', $recipe->category)
            ->assertSet('cuisine', $recipe->cuisine)
            ->assertSet('difficulty', $recipe->difficulty)
            ->assertSet('method', $recipe->method)
            ->assertSet('occasion', $recipe->occasion)
            ->assertSet('hours', $recipe->hours)
            ->assertSet('minutes', $recipe->minutes)
            ->assertSet('servings', $recipe->servings)
            ->assertSet('calories', $recipe->calories)
            ->assertSet('video', $recipe->video)
            ->assertSet('notes', $recipe->notes)
            ->assertSet('public', $recipe->public)
            ->set('title', 'Updated Recipe Title')
            ->set('description', 'Updated Recipe Description')
            ->call('saveRecipe')
            ->assertHasNoErrors();

        // Assert database has updated recipe
        $this->assertDatabaseHas('recipes', [
            'id' => $recipe->id,
            'title' => 'Updated Recipe Title',
            'description' => 'Updated Recipe Description',
        ]);
    }

    public function test_delete_recipe_works_correctly()
    {
        // Create a user and recipe
        $recipeOwner = User::factory()->create();
        $recipe = Recipe::factory()->create([
            'user_id' => $recipeOwner->id,
        ]);

        $this->actingAs($recipeOwner);

        // Update recipe
        Livewire::test('edit-recipe', [
            'uuid' => $recipe->uuid,
        ])
            ->assertSet('uuid', $recipe->uuid)
            ->call('deleteRecipe')
            ->assertRedirect(route('my-recipes'));

        // Assert database has updated recipe
        $this->assertDatabaseMissing('recipes', [
            'id' => $recipe->id,
            'uuid' => $recipe->uuid,
        ]);
    }

    public function test_remove_image_works_correctly()
    {
        // Create a user and recipe
        $recipeOwner = User::factory()->create();
        $recipe = Recipe::factory()->create([
            'user_id' => $recipeOwner->id,
            'image' => 'storage/recipes/test-image.jpg',
        ]);

        $this->actingAs($recipeOwner);

        // Update recipe
        Livewire::test('edit-recipe', [
            'uuid' => $recipe->uuid,
        ])
            ->assertSet('uuid', $recipe->uuid)
            ->assertSet('imagePath', $recipe->image)
            ->call('removeImage')
            ->assertHasNoErrors()
            ->assertSet('imagePath', null);

        // Assert database has updated recipe
        $this->assertDatabaseHas('recipes', [
            'id' => $recipe->id,
            'uuid' => $recipe->uuid,
            'image' => null,
        ]);
    }
}
