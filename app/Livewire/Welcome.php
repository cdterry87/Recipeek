<?php

namespace App\Livewire;

use Livewire\Component;

class Welcome extends Component
{
    public $search;
    public $email;
    public $isSubscribed = false;

    public function render()
    {
        // Get 4 random public recipes
        $recipes = \App\Models\Recipe::query()
            ->where('public', true)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return view('livewire.welcome', [
            'recipes' => $recipes,
        ]);
    }

    public function discover()
    {
        $this->validate([
            'search' => 'required|min:3',
        ]);

        // Redirect to the discover page with the search query
        return redirect()->route('discover-recipes', ['search' => $this->search]);
    }

    public function subscribe()
    {
        $this->validate([
            'email' => 'required|email',
        ]);

        // Subscriptions will not work in this demo site

        $this->isSubscribed = true;
    }
}
