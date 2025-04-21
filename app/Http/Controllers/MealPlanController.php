<?php

namespace App\Http\Controllers;

use App\Models\MealPlan;
use Illuminate\Http\Request;

class MealPlanController extends Controller
{
    public function show(MealPlan $mealPlan)
    {
        // Eager load relationships if needed
        $mealPlan->load(['recipes' => function($query) {
            $query->orderBy('pivot_date')
                  ->orderByRaw("FIELD(pivot_meal_type, 'breakfast', 'lunch', 'dinner', 'snack')");
        }]);
    
        return view('meal-plans.show', compact('mealPlan'));
    }
public function create()
{
    return view('meal-plans.create');
}
public function store(Request $request)
{
    $validated = $request->validate([
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
        'name' => 'nullable|string|max:255',
        'notes' => 'nullable|string'
    ]);

    // Create meal plan for authenticated user
    $mealPlan = auth()->user()->mealPlans()->create($validated);

    return redirect()->route('meal-plans.show', $mealPlan)
        ->with('success', 'Meal plan created successfully!');
}

    public function index()
    {
        $mealPlans = auth()->user()->mealPlans()
            ->withCount('recipes')
            ->orderBy('start_date', 'desc')
            ->paginate(10);

        return view('meal-plans.index', compact('mealPlans'));
    }
public function calendar(MealPlan $meal_plan)
{
    $this->authorize('view', $meal_plan);

    $startDate = $meal_plan->start_date;
    $endDate = $meal_plan->end_date;
    
    // Group recipes by date and meal type
    $calendarData = $meal_plan->recipes()
        ->get()
        ->groupBy(['pivot.date', 'pivot.meal_type']);

    // Get available recipes not yet in the plan
    $availableRecipes = auth()->user()->recipes()
        ->whereNotIn('id', $meal_plan->recipes->pluck('id'))
        ->get();
     
    return view('meal-plans.calendar', compact(
        'meal_plan',
        'startDate',
        'endDate',
        'calendarData',
        'availableRecipes'
    ));
}

public function addRecipe(Request $request, MealPlan $meal_plan)
{
    $this->authorize('update', $meal_plan);

    $validated = $request->validate([
        'recipe_id' => 'required|exists:recipes,id',
        'date' => 'required|date',
        'meal_type' => 'required|in:breakfast,lunch,dinner,snack',
        'servings' => 'required|integer|min:1'
    ]);

    $meal_plan->recipes()->attach($validated['recipe_id'], [
        'date' => $validated['date'],
        'meal_type' => $validated['meal_type'],
        'servings' => $validated['servings']
    ]);

    return response()->json(['message' => 'Recipe added to meal plan']);
}

public function updateRecipePosition(Request $request, MealPlan $meal_plan, Recipe $recipe)
{
    $this->authorize('update', $meal_plan);

    $validated = $request->validate([
        'date' => 'required|date',
        'meal_type' => 'required|in:breakfast,lunch,dinner,snack'
    ]);

    $meal_plan->recipes()->updateExistingPivot($recipe->id, [
        'date' => $validated['date'],
        'meal_type' => $validated['meal_type']
    ]);

    return response()->json(['message' => 'Recipe position updated']);
}
}
