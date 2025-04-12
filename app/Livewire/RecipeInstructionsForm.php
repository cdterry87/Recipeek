<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RecipeInstruction;

class RecipeInstructionsForm extends Component
{

    public $recipeId;
    public $instruction, $order;

    public function saveInstruction()
    {
        $this->validate([
            'instruction' => 'required|string|min:3|max:9999',
            'order' => 'required|integer|min:1|max:9999',
        ]);

        // Check if the order already exists
        $existingInstruction = RecipeInstruction::where('recipe_id', $this->recipeId)
            ->where('order', $this->order)
            ->first();

        if ($existingInstruction) {
            // Increment the order of subsequent instructions
            RecipeInstruction::where('recipe_id', $this->recipeId)
                ->where('order', '>=', $this->order)
                ->increment('order');
        }

        RecipeInstruction::create([
            'recipe_id' => $this->recipeId,
            'instruction' => $this->instruction,
            'order' => $this->order,
        ]);

        $this->instruction = null;
        $this->order = null;

        session()->flash('recipe-instructions-message', 'Instruction added successfully!');
    }

    public function removeInstruction($instructionId)
    {
        $instruction = RecipeInstruction::find($instructionId);

        if ($instruction) {
            // Decrement the order of subsequent instructions
            RecipeInstruction::where('recipe_id', $this->recipeId)
                ->where('order', '>', $instruction->order)
                ->decrement('order');
        }

        $instruction->destroy($instructionId);
        session()->flash('recipe-instructions-message', 'Instruction removed successfully!');
    }

    public function render()
    {
        $instructions = RecipeInstruction::where('recipe_id', $this->recipeId)->orderBy('order')->get();

        return view('livewire.recipe-instructions-form', [
            'instructions' => $instructions,
        ]);
    }
}
