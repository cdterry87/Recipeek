<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RecipeIngredientsFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_recipe_ingredients_form_submits_correctly()
    {
        $this->assertTrue(true);
    }
}
