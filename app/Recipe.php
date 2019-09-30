<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipes';

    protected $guarded = [];



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
        return $this->hasMany('App\RecipeTags');
    }

    public function favorites()
    {
        return $this->hasMany('App\UserFavorites')->where('user_id', auth()->id());
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
