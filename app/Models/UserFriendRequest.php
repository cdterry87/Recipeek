<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserFriendRequest extends Model
{
    protected $table = 'users_friend_requests';
    protected $fillable = ['from_user_id', 'to_user_id'];

    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function toUser()
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }
}
