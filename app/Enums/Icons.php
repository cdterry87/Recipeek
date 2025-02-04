<?php

namespace App\Enums;

enum Icons: string
{
    case Recipes = 'heroicon-o-book-open';
    case Ingredients = 'heroicon-o-squares-plus';
    case Instructions = 'heroicon-o-numbered-list';

    case New = 'heroicon-o-plus';
    case Edit = 'heroicon-o-pencil';
    case View = 'heroicon-o-eye';
    case Delete = 'heroicon-o-trash';
    case Save = 'heroicon-o-check';
    case Cancel = 'heroicon-o-x-mark';
}
