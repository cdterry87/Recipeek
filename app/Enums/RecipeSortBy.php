<?php

namespace App\Enums;

use App\Traits\WithEnumValues;

enum RecipeSortBy: string
{
    use WithEnumValues;

    case TITLE = 'title';
    case DATE = 'created_at';
    case POPULARITY = 'saves';
    case RATING = 'rating';
    case COOK_TIME = 'cook_time';

    public static function dropdown(): array
    {
        return [
            self::TITLE->value => 'by Title',
            self::DATE->value => 'by Date',
            self::POPULARITY->value => 'by Popularity', // Most saves
            self::RATING->value => 'by Rating', // Average rating
            self::COOK_TIME->value => 'by Cook Time', // Time to cook based on total minutes
        ];
    }

    public static function default(): string
    {
        return self::DATE->value;
    }
}
