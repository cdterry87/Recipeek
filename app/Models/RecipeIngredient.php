<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecipeIngredient extends Model
{
    protected $table = 'recipes_ingredients';
    protected $guarded = [];

    public function recipe(): BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }
}
