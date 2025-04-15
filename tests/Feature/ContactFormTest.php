<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_form_renders_correctly(): void
    {
        Livewire::test('contact-form')
            ->set('isFormSubmitted', false)
            ->assertSee('Name')
            ->assertSee('Email')
            ->assertSee('Message');
    }

    public function test_contact_form_submission(): void
    {
        Livewire::test('contact-form')
            ->set('name', '')
            ->set('email', '')
            ->set('message', '')
            ->call('submit')
            ->assertHasErrors(['name', 'email', 'message'])
            ->set('name', 'John Doe')
            ->set('email', 'jdoe@example.com')
            ->set('message', 'This is a test message.')
            ->call('submit')
            ->assertSet('isFormSubmitted', true)
            ->assertSee('Thank you');
    }
}
