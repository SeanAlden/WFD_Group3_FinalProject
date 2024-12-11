<?php

namespace App;

enum ProductCategory: string
{
    case CATEGORY_1 = 'Category 1';
    case CATEGORY_2 = 'Category 2';
    case CATEGORY_3 = 'Category 3';

    public static function getValues(): array
    {
        return array_column(ProductCategory::cases(), 'value');
    }
}
