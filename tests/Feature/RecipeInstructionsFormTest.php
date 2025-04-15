<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Recipe;
use Livewire\Livewire;
use App\Models\RecipeIngredient;
use App\Models\RecipeInstruction;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RecipeInstructionsFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_recipe_instructions_form_renders_correctly()
    {
        $user = User::factory()->create();
        $recipe = Recipe::factory()->create(['user_id' => $user->id]);

        Livewire::test('recipe-instructions-form', [
            'recipeId' => $recipe->id,
        ])
            ->assertSet('recipeId', $recipe->id)
            ->assertSee('Save Instruction')
            ->assertSee('no-instructions'); // No instructions added yet
    }

    public function test_add_and_remove_recipe_instruction_works_correctly()
    {
        $user = User::factory()->create();
        $recipe = Recipe::factory()->create(['user_id' => $user->id]);

        Livewire::test('recipe-instructions-form', [
            'recipeId' => $recipe->id,
        ])
            ->assertSet('recipeId', $recipe->id)
            ->assertSee('no-instructions')
            ->set('instruction', '')
            ->set('order', '')
            ->call('saveInstruction')
            ->assertHasErrors(['instruction', 'order'])
            ->set('instruction', 'Preheat the oven to 350F')
            ->set('order', '1')
            ->call('saveInstruction')
            ->assertHasNoErrors()
            ->assertDontSee('no-instructions')
            ->assertSee('Preheat the oven to 350F');

        $instruction = RecipeInstruction::query()
            ->where('recipe_id', $recipe->id)
            ->where('instruction', 'Preheat the oven to 350F')
            ->where('order', '1')
            ->first();
        $this->assertNotNull($instruction);

        Livewire::test('recipe-instructions-form', [
            'recipeId' => $recipe->id,
        ])
            ->assertSet('recipeId', $recipe->id)
            ->assertDontSee('no-instructions')
            ->call('removeInstruction', $instruction->id)
            ->assertHasNoErrors()
            ->assertSee('no-instructions');
    }
}
