<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ForgotPasswordTest extends TestCase
{
    public function test_forgot_password_page_renders_correctly()
    {
        $response = $this->get(route('forgot-password'));
        $response->assertStatus(200);
    }
}
