<?php

namespace App\Livewire;

use Livewire\Component;

class Welcome extends Component
{
    public $email;
    public $isSubscribed = false;

    public function render()
    {
        // Get 4 random recipes
        $recipes = \App\Models\Recipe::inRandomOrder()->limit(4)->get();

        return view('livewire.welcome', [
            'recipes' => $recipes,
        ]);
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
