<?php

namespace App\Livewire;

use Livewire\Component;

class LoginRegister extends Component
{
    public $email, $password, $name, $password_confirmation;

    public function mount()
    {
        // Redirect to the home page or any other page
        if (auth()->check()) {
            return redirect()->route('home');
        }
    }

    public function render()
    {
        return view('livewire.login-register')
            ->layout('components.layouts.auth');
    }

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (auth()->attempt($credentials)) {
            return redirect()->intended(route('home'));
        }

        session()->flash('login-error', 'Invalid credentials. Please try again.');
    }

    public function register()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = \App\Models\User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        auth()->login($user);

        return redirect()->route('home');
    }
}
