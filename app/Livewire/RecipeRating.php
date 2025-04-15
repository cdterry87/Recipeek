<?php

namespace App\Livewire;

use Livewire\Component;

class RecipeRating extends Component
{
    protected $listeners = ['refreshRating' => '$refresh'];

    public $recipe;
    public $rating;

    public function render()
    {
        $this->rating = $this->recipe->currentUserRating();

        return view('livewire.recipe-rating', [
            'currentUserRating' => $this->recipe->currentUserRating(),
            'averageRating' => $this->recipe->averageRating(),
            'totalRatings' => $this->recipe->totalRatings(),
            'totalSaves' => $this->recipe->totalSaves(),
            'canRate' => $this->recipe->canRate(),
        ]);
    }

    public function updatedRating($value)
    {
        $this->rate();
    }

    public function rate()
    {
        if (!$this->recipe->canRate()) {
            return;
        }

        $this->validate([
            'rating' => 'required|integer|min:0|max:5',
        ]);

        $this->recipe->ratings()->updateOrCreate(
            ['user_id' => auth()->id()],
            ['rating' => $this->rating]
        );
    }
}
