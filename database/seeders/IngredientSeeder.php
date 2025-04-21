<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $ingredients = [
            'Salt',
            'Pepper',
            'Tomato',
            'Onion',
            'Garlic',
            'Olive Oil'
        ];

        foreach ($ingredients as $name) {
            Ingredient::create(['name' => $name]);
        }
    }
}
