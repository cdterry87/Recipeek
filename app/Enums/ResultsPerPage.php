<?php

namespace App\Enums;

use App\Traits\WithEnumValues;

enum ResultsPerPage: int
{
    use WithEnumValues;

    case EIGHT = 8;
    case TWENTY_FOUR = 24;
    case FORTY_EIGHT = 48;
    case SIXTY_FOUR = 64;
    case NINETY_SIX = 96;

    public static function dropdown(): array
    {
        return [
            self::EIGHT->value => '8 per page',
            self::TWENTY_FOUR->value => '24 per page',
            self::FORTY_EIGHT->value => '48 per page',
            self::SIXTY_FOUR->value => '64 per page',
            self::NINETY_SIX->value => '96 per page',
        ];
    }

    public static function default(): int
    {
        return self::EIGHT->value;
    }
}
