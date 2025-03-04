<?php

namespace App\Traits;

trait WithEnumValues
{
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function labels(): array
    {
        return array_column(self::cases(), 'name');
    }

    public static function dropdown(): array
    {
        return array_combine(self::values(), self::values());
    }
}
