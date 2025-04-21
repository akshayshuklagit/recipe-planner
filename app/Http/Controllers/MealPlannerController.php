<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MealPlannerController extends Controller
{
    public function index()
    {
        return view('meal-planner');
    }

    public function search(Request $request)
{
    $request->validate([
        'query' => 'required|string|min:2'
    ]);

    $query = $request->input('query');
    
    try {
        $response = Http::get("https://api.spoonacular.com/recipes/complexSearch", [
            'apiKey' => config('services.spoonacular.key'),
            'query' => $query,
            'number' => 10,
            'addRecipeInformation' => true,
            'fillIngredients' => true
        ]);
        
        if ($response->successful()) {
            $recipes = $response->json()['results'] ?? [];
            return view('meal-planner', [
                'recipes' => $recipes,
                'searchQuery' => $query
            ]);
        }
        
        return back()->with('error', 'No recipes found. Please try a different search.');
        
    } catch (\Exception $e) {
        return back()->with('error', 'Failed to fetch recipes. Please try again later.');
    }

    if (RateLimiter::tooManyAttempts('meal-search:'.auth()->id(), 5)) {
        $seconds = RateLimiter::availableIn('meal-search:'.auth()->id());
        return back()->with('error', "Too many searches! Please wait {$seconds} seconds.");
    }
    RateLimiter::hit('meal-search:'.auth()->id(), 60);
}
}