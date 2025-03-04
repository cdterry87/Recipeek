<?php

namespace App\Enums;

use App\Traits\WithEnumValues;

enum SortDirection: string
{
    use WithEnumValues;

    case ASC = 'asc';
    case DESC = 'desc';

    public static function dropdown(): array
    {
        return [
            self::ASC->value => 'in Ascending order',
            self::DESC->value => 'in Descending order',
        ];
    }

    public static function default(): string
    {
        return self::DESC->value;
    }
}
