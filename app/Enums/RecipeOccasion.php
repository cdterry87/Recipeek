<?php

namespace App\Enums;

use App\Traits\WithEnumValues;

enum RecipeOccasion: string
{
    use WithEnumValues;

    case ANY_OCCASION = 'Any Occasion';
    case BIRTHDAY = 'Birthday';
    case EVERYDAY = 'Everyday';
    case HOLIDAY = 'Holiday';
    case CHRISTMAS = 'Christmas';
    case THANKSGIVING = 'Thanksgiving';
    case EASTER = 'Easter';
    case SUMMER = 'Summer';
    case WINTER = 'Winter';
}
