<?php

namespace App\Livewire;

use App\Models\Recipe;
use App\Models\RecipeSave;
use Livewire\Component;

class ViewRecipe extends Component
{
    public Recipe $recipe;

    public function mount(Recipe $recipe)
    {
        $this->recipe = $recipe->load(['ingredients', 'instructions']);

        if (auth()->check() && request()->has('action') && request()->get('action') === 'save') {
            $this->save();
        }
    }

    public function render()
    {
        return view('livewire.view-recipe');
    }

    public function save()
    {
        if (auth()->guest()) {
            session()->put('url.intended', route(
                'view-recipe',
                [
                    'recipe' => $this->recipe->slug,
                    'action' => 'save'
                ]
            ));
            return redirect()->route('login');
        }

        // Prevent saving the recipe if the user has already saved it or is the owner of the recipe
        if ($this->recipe->isSavedByUser() || $this->recipe->isOwnedByUser()) {
            return;
        }

        RecipeSave::updateOrCreate([
            'user_id' => auth()->id(),
            'recipe_id' => $this->recipe->id,
        ]);

        session()->flash('message', 'Recipe saved successfully.');
    }

    public function unsave()
    {
        if (auth()->guest()) {
            return redirect()->route('login');
        }

        RecipeSave::where([
            'user_id' => auth()->id(),
            'recipe_id' => $this->recipe->id,
        ])->delete();

        session()->flash('message', 'Recipe unsaved successfully.');
    }

    public function edit()
    {
        // Only available if the user is logged in and is the owner of the recipe
        if (auth()->guest() || !$this->recipe->isOwnedByUser()) {
            return redirect()->route('login');
        }
        return redirect()->route('edit-recipe', ['recipe' => $this->recipe->slug]);
    }

    public function print()
    {
        //
    }
}
