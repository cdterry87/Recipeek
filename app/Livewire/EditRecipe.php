<?php

namespace App\Livewire;

use App\Models\Recipe;
use Livewire\Component;

class EditRecipe extends Component
{
    public Recipe $recipe;

    public function mount(Recipe $recipe)
    {
        $this->recipe = $recipe->load(['ingredients', 'instructions']);

        // If the user is not the owner of the recipe, redirect them to the view recipe page
        if ($this->recipe->user_id !== auth()->id()) {
            return redirect()->route('view-recipe', ['recipe' => $this->recipe->slug]);
        }
    }

    public function render()
    {
        return view('livewire.edit-recipe');
    }
}
