<?php

namespace App\Enums;

use App\Traits\WithEnumValues;

enum ResultsPerPage: int
{
    use WithEnumValues;

    case TWELVE = 12;
    case TWENTY_FOUR = 24;
    case FORTY_EIGHT = 48;
    case SEVENTY_TWO = 72;
    case NINETY_SIX = 96;

    public static function dropdown(): array
    {
        return [
            self::TWELVE->value => '12 per page',
            self::TWENTY_FOUR->value => '24 per page',
            self::FORTY_EIGHT->value => '48 per page',
            self::SEVENTY_TWO->value => '72 per page',
            self::NINETY_SIX->value => '96 per page',
        ];
    }

    public static function default(): int
    {
        return self::TWELVE->value;
    }
}
