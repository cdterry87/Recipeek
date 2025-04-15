<?php

namespace App\Enums;

use App\Traits\WithEnumValues;

enum RecipeMethod: string
{
    use WithEnumValues;

    case AIR_FRYER = 'Air Fryer';
    case ASSEMBLED = 'Assembled';
    case BAKED = 'Baked';
    case BBQ = 'BBQ';
    case BOIL = 'Boiled';
    case BROILED = 'Broiled';
    case DEEP_FRY = 'Deep Fried';
    case GRILLED = 'Grilled';
    case INSTANT_POT = 'Instant Pot';
    case RAW = 'Raw';
    case ROASTED = 'Roasted';
    case SAUTEED = 'Sautéed';
    case SIMMER = 'Simmer';
    case SLOW_COOKER = 'Slow Cooker';
    case SMOKED = 'Smoked';
    case STEAMED = 'Steamed';
    case STIR_FRY = 'Stir-Fried';
    case STOVETOP = 'Stovetop';
}
