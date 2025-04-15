<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Recipe;
use Livewire\Livewire;
use App\Models\RecipeIngredient;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RecipeIngredientsFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_recipe_ingredients_form_renders_correctly()
    {
        $user = User::factory()->create();
        $recipe = Recipe::factory()->create(['user_id' => $user->id]);

        Livewire::test('recipe-ingredients-form', [
            'recipeId' => $recipe->id,
        ])
            ->assertSet('recipeId', $recipe->id)
            ->assertSee('Save Ingredient')
            ->assertSee('no-ingredients'); // No ingredients added yet
    }

    public function test_add_and_remove_recipe_ingredient_works_correctly()
    {
        $user = User::factory()->create();
        $recipe = Recipe::factory()->create(['user_id' => $user->id]);

        Livewire::test('recipe-ingredients-form', [
            'recipeId' => $recipe->id,
        ])
            ->assertSet('recipeId', $recipe->id)
            ->assertSee('no-ingredients')
            ->set('ingredient', '')
            ->call('saveIngredient')
            ->assertHasErrors(['ingredient'])
            ->set('ingredient', 'Sugar')
            ->set('quantity', '1')
            ->set('unit', 'cup')
            ->call('saveIngredient')
            ->assertHasNoErrors()
            ->assertDontSee('no-ingredients')
            ->assertSee('Sugar');

        $ingredient = RecipeIngredient::query()
            ->where('recipe_id', $recipe->id)
            ->where('ingredient', 'Sugar')
            ->where('quantity', '1')
            ->where('unit', 'cup')
            ->first();
        $this->assertNotNull($ingredient);

        Livewire::test('recipe-ingredients-form', [
            'recipeId' => $recipe->id,
        ])
            ->assertSet('recipeId', $recipe->id)
            ->assertDontSee('no-ingredients')
            ->call('removeIngredient', $ingredient->id)
            ->assertHasNoErrors()
            ->assertSee('no-ingredients');
    }
}
