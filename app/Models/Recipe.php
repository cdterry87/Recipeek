<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recipe extends Model
{
    use HasFactory;

    protected $table = 'recipes';
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ingredients(): HasMany
    {
        return $this->hasMany(RecipeIngredient::class);
    }

    public function instructions(): HasMany
    {
        return $this->hasMany(RecipeInstruction::class);
    }

    public function tags(): HasMany
    {
        return $this->hasMany(RecipeTag::class);
    }

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'recipes_likes')->withTimestamps();
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(RecipeRating::class);
    }

    public function averageRating(): float
    {
        return $this->ratings()->avg('rating');
    }

    public function getFormattedTime()
    {
        $hours = $this->hours;
        $minutes = $this->minutes;

        if ($hours === null && $minutes === null) return null;

        $formattedTime = '';
        if ($hours > 0) {
            $formattedTime .= $hours . 'h ';
        }
        if ($minutes > 0) {
            $formattedTime .= $minutes . 'm';
        }
        return trim($formattedTime);
    }
}
