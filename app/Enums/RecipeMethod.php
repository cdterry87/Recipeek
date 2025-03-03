<?php

namespace App\Enums;

enum RecipeTag: string
{
    case BAKED = 'Baked';
    case GRILLED = 'Grilled';
    case ROASTED = 'Roasted';
    case STIR_FRY = 'Stir-Fried';
    case SLOW_COOKER = 'Slow Cooker';
    case AIR_FRYER = 'Air Fryer';
    case INSTANT_POT = 'Instant Pot';
    case STEAMED = 'Steamed';
    case RAW = 'Raw';
    case DEEP_FRY = 'Deep Fried';
    case BROILED = 'Broiled';
    case BBQ = 'BBQ';
    case SAUTÉED = 'Sautéed';
    case SMOKED = 'Smoked';

    /**
     * Get all tag values.
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
