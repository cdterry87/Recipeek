<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RecipeIngredient;

class RecipeIngredientsForm extends Component
{
    public $recipeId;
    public $ingredient, $quantity, $unit;

    public function saveIngredient()
    {
        $this->validate([
            'ingredient' => 'required|string|max:80',
            'quantity' => 'nullable|string|max:20',
            'unit' => 'nullable|string|max:20',
        ]);

        RecipeIngredient::create([
            'recipe_id' => $this->recipeId,
            'ingredient' => $this->ingredient,
            'quantity' => $this->quantity,
            'unit' => $this->unit,
        ]);

        $this->ingredient = null;
        $this->quantity = null;
        $this->unit = null;

        session()->flash('recipe-ingredients-message', 'Ingredient added successfully!');
    }

    public function removeIngredient($ingredientId)
    {
        RecipeIngredient::destroy($ingredientId);
        session()->flash('recipe-ingredients-message', 'Ingredient removed successfully!');
    }

    public function render()
    {
        $ingredients = RecipeIngredient::where('recipe_id', $this->recipeId)->get();

        return view('livewire.recipe-ingredients-form', [
            'ingredients' => $ingredients,
        ]);
    }
}
