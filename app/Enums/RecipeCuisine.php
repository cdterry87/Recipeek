<?php

namespace App\Enums;

use App\Traits\WithEnumValues;

enum RecipeCuisine: string
{
    use WithEnumValues;

    case AFRICAN = 'African';
    case AMERICAN = 'American';
    case CARIBBEAN = 'Caribbean';
    case CHINESE = 'Chinese';
    case FRENCH = 'French';
    case GERMAN = 'German';
    case INDIAN = 'Indian';
    case ITALIAN = 'Italian';
    case JAPANESE = 'Japanese';
    case KOREAN = 'Korean';
    case LATIN_AMERICAN = 'Latin American';
    case MEDITERRANEAN = 'Mediterranean';
    case MEXICAN = 'Mexican';
    case MIDDLE_EASTERN = 'Middle Eastern';
    case SOUTHERN = 'Southern';
    case THAI = 'Thai';
    case VIETNAMESE = 'Vietnamese';
}
