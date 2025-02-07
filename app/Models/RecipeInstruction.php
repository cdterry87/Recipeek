<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecipeInstruction extends Model
{
    protected $table = 'recipes_instructions';
    protected $guarded = [];

    public function recipe(): BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }
}
