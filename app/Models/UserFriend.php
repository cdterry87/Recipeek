<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserFriend extends Model
{
    protected $table = 'users_friends';
    protected $fillable = ['user_id', 'friend_id', 'accepted_at', 'rejected_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function friend()
    {
        return $this->belongsTo(User::class);
    }
}
