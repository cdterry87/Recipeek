<?php

namespace App\Models;

use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Sluggable\HasSlug;

class Recipe extends Model
{
    use HasFactory;
    use HasSlug;

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

    public function saves()
    {
        return $this->belongsToMany(User::class, 'recipes_saves', 'recipe_id', 'user_id');
    }

    public function totalSaves(): int
    {
        return $this->saves()->count();
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

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
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
