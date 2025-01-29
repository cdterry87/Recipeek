<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecipeTag extends Model
{
    protected $table = 'recipes_tags';
    protected $guarded = [];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
