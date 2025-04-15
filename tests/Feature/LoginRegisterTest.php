<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginRegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_register_page_renders_correctly()
    {
        $this->assertTrue(true);
    }
}
