<?php

namespace App\Livewire;

use App\Models\Recipe;
use App\Models\RecipeIngredient;
use App\Models\RecipeInstruction;
use Livewire\Component;

class CreateRecipe extends Component
{
    public $title, $description, $category, $cuisine, $difficulty, $method, $occasion;
    public $hours, $minutes, $servings, $calories, $image, $video, $private = false;

    public $ingredients = [];
    public $newIngredient = ['ingredient' => '', 'quantity' => '', 'unit' => ''];

    public $instructions = [];
    public $newInstruction = ['instruction' => '', 'order' => 1];

    public function addIngredient()
    {
        $this->ingredients[] = $this->newIngredient;
        $this->newIngredient = ['ingredient' => '', 'quantity' => '', 'unit' => ''];
    }

    public function removeIngredient($index)
    {
        unset($this->ingredients[$index]);
        $this->ingredients = array_values($this->ingredients);
    }

    public function addInstruction()
    {
        $this->instructions[] = $this->newInstruction;
        $this->newInstruction = ['instruction' => '', 'order' => max(array_column($this->instructions, 'order')) + 1];
    }

    public function removeInstruction($index)
    {
        unset($this->instructions[$index]);
        $this->instructions = array_values($this->instructions);
    }

    public function saveRecipe()
    {
        $validatedData = $this->validate([
            'title' => 'required|string|max:60',
            'category' => 'nullable|string|max:20',
            'cuisine' => 'nullable|string|max:20',
            'difficulty' => 'nullable|string|max:20',
            'method' => 'nullable|string|max:20',
            'occasion' => 'nullable|string|max:20',
            'hours' => 'nullable|integer',
            'minutes' => 'nullable|integer',
            'servings' => 'nullable|integer',
            'calories' => 'nullable|integer',
            'image' => 'nullable|string',
            'video' => 'nullable|string',
        ]);

        $recipe = Recipe::create([
            'title' => $this->title,
            'description' => $this->description,
            'category' => $this->category,
            'cuisine' => $this->cuisine,
            'difficulty' => $this->difficulty,
            'method' => $this->method,
            'occasion' => $this->occasion,
            'hours' => $this->hours,
            'minutes' => $this->minutes,
            'servings' => $this->servings,
            'calories' => $this->calories,
            'image' => $this->image,
            'video' => $this->video,
            'private' => $this->private,
            'user_id' => auth()->id(),
        ]);

        foreach ($this->ingredients as $ingredient) {
            RecipeIngredient::create([
                'recipe_id' => $recipe->id,
                'ingredient' => $ingredient['ingredient'],
                'quantity' => $ingredient['quantity'],
                'unit' => $ingredient['unit'],
            ]);
        }

        foreach ($this->instructions as $instruction) {
            RecipeInstruction::create([
                'recipe_id' => $recipe->id,
                'instruction' => $instruction['instruction'],
                'order' => $instruction['order'],
            ]);
        }

        session()->flash('message', 'Recipe created successfully!');
        return redirect()->route('recipes.index');
    }

    public function render()
    {
        return view('livewire.create-recipe');
    }
}
