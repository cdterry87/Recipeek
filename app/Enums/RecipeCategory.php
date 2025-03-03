<?php

namespace App\Enums;

enum RecipeCategory: string
{
    case BREAKFAST = 'Breakfast';
    case LUNCH = 'Lunch';
    case DINNER = 'Dinner';
    case SNACK = 'Snack';
    case DESSERT = 'Dessert';
    case APPETIZER = 'Appetizer';
    case SIDE = 'Side';
    case SOUP = 'Soup';
    case SALAD = 'Salad';
    case BEVERAGE = 'Beverage';
    case SMOOTHIE = 'Smoothie';

    /**
     * Get all tag values.
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
