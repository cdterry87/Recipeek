<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FriendRequestsTest extends TestCase
{
    use RefreshDatabase;

    public function test_friend_requests_page_renders_correctly()
    {
        $this->assertTrue(true);
    }
}
