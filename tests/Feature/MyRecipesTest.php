<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MyRecipesTest extends TestCase
{
    use RefreshDatabase;

    public function test_my_recipes_page_renders_correctly()
    {
        $this->assertTrue(true);
    }
}
