<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSave extends Model
{
    protected $table = 'users_saves';
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
