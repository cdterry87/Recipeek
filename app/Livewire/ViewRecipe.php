<?php

namespace App\Livewire;

use App\Models\Recipe;
use Livewire\Component;

class ViewRecipe extends Component
{
    public Recipe $recipe;

    public function mount(Recipe $recipe)
    {
        $this->recipe = $recipe->load(['ingredients', 'instructions']);
    }

    public function render()
    {
        return view('livewire.view-recipe');
    }
}
