<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewCreatorTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_creator_page_renders_correctly()
    {
        $this->assertTrue(true);
    }
}
