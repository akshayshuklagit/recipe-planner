<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DietaryRestriction; 
use App\Models\Ingredient;

class DietaryRestrictionsSeeder extends Seeder
{
    public function run()
    {
        $restrictions = [
            ['name' => 'Vegetarian', 'slug' => 'vegetarian'],
            ['name' => 'Vegan', 'slug' => 'vegan'],
            ['name' => 'Gluten-Free', 'slug' => 'gluten-free'],
            ['name' => 'Dairy-Free', 'slug' => 'dairy-free'],
            ['name' => 'Nut-Free', 'slug' => 'nut-free'],
        ];

        foreach ($restrictions as $restriction) {
            DietaryRestriction::create($restriction);
        }
    }
}
