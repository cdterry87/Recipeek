<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipes';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User')->withTimestamps();
    }

    public function ingredients()
    {
        return $this->hasMany('App\RecipeIngredients');
    }

    public function instructions()
    {
        return $this->hasMany('App\RecipeInstructions');
    }

    public function tags()
    {
        return $this->hasMany('App\Tag');
    }
}
