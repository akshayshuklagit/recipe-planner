<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DietaryRestrictionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $restrictions = [
            'Vegan',
            'Vegetarian',
            'Gluten-Free',
            'Nut-Free',
            'Dairy-Free'
        ];

        foreach ($restrictions as $name) {
            DietaryRestriction::create(['name' => $name]);
        }
    }
}
