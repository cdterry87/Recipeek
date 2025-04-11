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
        RecipeInstruction::destroy($instructionId);
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
