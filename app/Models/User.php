<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    use HasSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'bio',
        'private',
        'slug',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }

    public function saves()
    {
        return $this->hasMany(RecipeSave::class);
    }

    public function ratings()
    {
        return $this->hasMany(RecipeRating::class);
    }

    public function followers()
    {
        return $this->hasMany(UserFollower::class);
    }

    public function friends()
    {
        return $this->hasMany(UserFriend::class);
    }

    public function following()
    {
        return $this->hasMany(UserFollower::class, 'follower_id');
    }

    public function getInitials()
    {
        if ($this->name) {
            $nameParts = explode(' ', $this->name);
            $initials = '';
            $count = 0;
            foreach ($nameParts as $part) {
                $initials .= strtoupper($part[0]);

                $count++;
                if ($count >= 2) break;
            }
            return strtoupper($initials);
        }
        return strtoupper(substr($this->name, 0, 2));
    }

    public function getPrivateFriendRequestLink()
    {
        if (!$this->private_friend_request_id) return null;

        return route('private-friend-request', ['private_friend_request_id' => $this->private_friend_request_id]);
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
