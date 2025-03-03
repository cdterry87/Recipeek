<?php

namespace App\Enums;

enum RecipeCuisine: string
{
    case ITALIAN = 'Italian';
    case MEXICAN = 'Mexican';
    case CHINESE = 'Chinese';
    case JAPANESE = 'Japanese';
    case INDIAN = 'Indian';
    case THAI = 'Thai';
    case MEDITERRANEAN = 'Mediterranean';
    case FRENCH = 'French';
    case AMERICAN = 'American';
    case MIDDLE_EASTERN = 'Middle Eastern';
    case KOREAN = 'Korean';
    case LATIN_AMERICAN = 'Latin American';
    case CARIBBEAN = 'Caribbean';
    case AFRICAN = 'African';
    case SOUTHERN = 'Southern';


    /**
     * Get all tag values.
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
