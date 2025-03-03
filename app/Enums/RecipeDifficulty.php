<?php

namespace App\Enums;

enum RecipeDifficulty: string
{
    case EASY = 'Easy';
    case NORMAL = 'Normal';
    case HARD = 'Hard';
    case EXPERT = 'Expert';

    /**
     * Get all tag values.
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
