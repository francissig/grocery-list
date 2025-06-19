<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Fruits & Vegetables',
            'Meat & Poultry',
            'Dairy & Eggs',
            'Beverages',
            'Bakery & Bread',
            'Snacks & Sweets',
            'Household Items',
            'Frozen Foods',
        ];

        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }
    }
}
