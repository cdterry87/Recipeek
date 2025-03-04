<?php

namespace App\Enums;

use App\Traits\WithEnumValues;

enum RecipeTime: string
{
    use WithEnumValues;

    case FAST = 'Fast';
    case NORMAL = 'Normal';
    case TIME_INTENSIVE = 'Time-Intensive';
}
