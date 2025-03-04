<?php

namespace App\Enums;

use App\Traits\WithEnumValues;

enum RecipeDifficulty: string
{
    use WithEnumValues;

    case EASY = 'Easy';
    case NORMAL = 'Normal';
    case HARD = 'Hard';
    case EXPERT = 'Expert';
}
