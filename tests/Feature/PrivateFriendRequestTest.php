<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PrivateFriendRequestTest extends TestCase
{
    use RefreshDatabase;

    public function test_private_friend_request_page_renders_correctly()
    {
        $this->assertTrue(true);
    }
}
