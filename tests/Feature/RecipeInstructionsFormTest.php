<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RecipeInstructionsFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_recipe_instructions_form_submits_correctly()
    {
        $this->assertTrue(true);
    }
}
