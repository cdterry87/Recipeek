<?php

namespace App\Enums;

enum RecipeOccasion: string
{
    case HOLIDAY = 'Holiday';
    case CHRISTMAS = 'Christmas';
    case THANKSGIVING = 'Thanksgiving';
    case EASTER = 'Easter';
    case SUMMER = 'Summer';
    case WINTER = 'Winter';
    case BBQ = 'BBQ';

    /**
     * Get all tag values.
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
