<?php

namespace App\Enums;

use App\Traits\WithEnumValues;

enum RecipeOccasion: string
{
    use WithEnumValues;

    case HOLIDAY = 'Holiday';
    case CHRISTMAS = 'Christmas';
    case THANKSGIVING = 'Thanksgiving';
    case EASTER = 'Easter';
    case SUMMER = 'Summer';
    case WINTER = 'Winter';
}
