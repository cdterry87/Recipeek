<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Subscriber;
use Illuminate\Support\Str;

class Welcome extends Component
{
    public $search;
    public $email;
    public $isFormSubmitted = false;

    public function render()
    {
        // Get 4 random public recipes
        $recipes = \App\Models\Recipe::query()
            ->where('public', true)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        // Get the featured creator
        // @todo - at some point this will be dynamic, but for now we use a demo user
        $featuredCreator = User::query()
            ->where('email', 'demo@example.com')
            ->first();

        return view('livewire.welcome', [
            'recipes' => $recipes,
            'featuredCreator' => $featuredCreator
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
            'email' => 'required|email|unique:subscribers',
        ]);

        Subscriber::create([
            'email' => $this->email,
            'token' => Str::uuid()
        ]);

        $this->isFormSubmitted = true;
    }
}
