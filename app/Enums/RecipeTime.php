<?php

namespace App\Enums;

enum RecipeTime: string
{
    case F = 'Fast';
    case N = 'Normal';
    case T = 'Time-Intensive';

    /**
     * Get all tag values.
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
