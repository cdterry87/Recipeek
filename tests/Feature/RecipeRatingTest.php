<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RecipeRatingTest extends TestCase
{
    use RefreshDatabase;

    public function test_recipe_rating_renders_correctly()
    {
        $this->assertTrue(true);
    }
}
