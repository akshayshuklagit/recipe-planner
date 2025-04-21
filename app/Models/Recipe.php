<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'instructions',
        'prep_time',
        'cook_time',
        'servings',
        'user_id'
    ];

    /**
     * Relationship to User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship to Ingredients with pivot data
     */
    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class)
            ->withPivot('quantity', 'unit');
    }

    /**
     * Relationship to Dietary Restrictions
     */
    public function dietaryRestrictions()
    {
        return $this->belongsToMany(DietaryRestriction::class);
    }

    /**
     * Relationship to Meal Plans through pivot
     */
    public function mealPlans()
    {
        return $this->belongsToMany(MealPlan::class, 'meal_plan_recipes')
            ->withPivot('date', 'meal_type', 'servings')
            ->withTimestamps();
    }
}