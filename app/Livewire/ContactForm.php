<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ContactMessage;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $message;
    public $isFormSubmitted = false;

    protected $rules = [
        'name' => 'required|string|min:3',
        'email' => 'required|email',
        'message' => 'required|string|min:10|max:2000',
    ];

    public function submit()
    {
        $this->validate();

        // Save message to the database
        ContactMessage::create([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]);

        // Clear the form
        $this->reset(['name', 'email', 'message']);

        // Success message
        session()->flash('success', 'Your message has been saved successfully!');

        // @todo - send email to admin

        $this->isFormSubmitted = true;
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
