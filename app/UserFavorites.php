<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFavorites extends Model
{
    protected $table = 'users_favorites';

    protected $guarded = [];
}
