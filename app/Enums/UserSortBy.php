<?php

namespace App\Enums;

use App\Traits\WithEnumValues;

enum UserSortBy: string
{
    use WithEnumValues;

    case NAME = 'users.name';
    case DATE = 'created_at';

    public static function dropdown(): array
    {
        return [
            self::NAME->value => 'by Name',
            self::DATE->value => 'by Date Added',
        ];
    }

    public static function default(): string
    {
        return self::NAME->value;
    }
}
