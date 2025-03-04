<?php

namespace App\Enums;

use App\Traits\WithEnumValues;

enum RecipeCategory: string
{
    use WithEnumValues;

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
}
