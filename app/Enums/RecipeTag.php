<?php

namespace App\Enums;

use App\Traits\WithEnumValues;

enum RecipeTag: string
{
    use WithEnumValues;

    case VEGAN = 'Vegan';
    case VEGETARIAN = 'Vegetarian';
    case GLUTEN_FREE = 'Gluten-Free';
    case DAIRY_FREE = 'Dairy-Free';
    case NUT_FREE = 'Nut-Free';
    case SOY_FREE = 'Soy-Free';
    case KETO = 'Keto';
    case PALEO = 'Paleo';
    case LOW_CARB = 'Low-Carb';
    case HIGH_PROTEIN = 'High-Protein';
    case SUGAR_FREE = 'Sugar-Free';
    case HALAL = 'Halal';
    case KOSHER = 'Kosher';
}
