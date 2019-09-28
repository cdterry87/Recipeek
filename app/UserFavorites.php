<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class UserFavorites extends Model
{
    protected $table = 'users_favorites';

    protected $guarded = [];

    public function recipe()
    {
        return $this->belongsTo('App\Recipe');
    }
}
