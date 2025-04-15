<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutesTest extends TestCase
{
    public function test_about_page(): void
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
    }

    public function test_cookie_policy_page(): void
    {
        $response = $this->get('/cookie-policy');

        $response->assertStatus(200);
    }

    public function test_privacy_policy_page(): void
    {
        $response = $this->get('/privacy-policy');

        $response->assertStatus(200);
    }

    public function test_terms_of_use_page(): void
    {
        $response = $this->get('/terms-of-use');

        $response->assertStatus(200);
    }
}
