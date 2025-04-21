<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ingredient;

class IngredientsTableSeeder extends Seeder
{
    public function run()
    {
        $ingredients = [
            ['name' => 'Chicken Breast', 'category' => 'Meat'],
            ['name' => 'Broccoli', 'category' => 'Vegetable'],
            ['name' => 'Rice', 'category' => 'Grain'],
            ['name' => 'Olive Oil', 'category' => 'Pantry'],
            ['name' => 'Garlic', 'category' => 'Vegetable'],
        ];

        foreach ($ingredients as $ingredient) {
            Ingredient::firstOrCreate(
                ['name' => $ingredient['name']],  // Unique identifier
                ['category' => $ingredient['category']]  // Additional data
            );
        }
    }
}