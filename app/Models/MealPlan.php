<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'start_date',
        'end_date',
        'name',
        'notes'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    /**
     * Relationship to User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relationship to Recipes through pivot table
     */
    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'meal_plan_recipes')
            ->using(MealPlanRecipe::class)
            ->withPivot(['date', 'meal_type', 'servings'])
            ->withTimestamps();
    }
}