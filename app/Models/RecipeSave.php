<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecipeSave extends Model
{
    protected $table = 'recipes_saves';
    protected $guarded = [];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
