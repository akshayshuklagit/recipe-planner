<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\DietaryRestriction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RecipeController extends Controller
{
    /**
     * Display a listing of recipes.
     */
   

    /**
     * Show the form for creating a new recipe.
     */
    public function create()
    {
        $ingredients = Ingredient::all();
        $dietaryRestrictions = DietaryRestriction::all(); // Or whatever model you're using
    
        return view('recipes.create', compact('ingredients', 'dietaryRestrictions'));
    }
    

    /**
     * Store a newly created recipe in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'prep_time' => 'required|integer',
            'cook_time' => 'required|integer',
            'servings' => 'required|integer',
            'instructions' => 'required|string',
        ]);
    
        // Add user_id to the recipe data
        $validated['user_id'] = Auth::id();
    
        // Create the recipe
        $recipe = Recipe::create($validated);
    
        // If you're handling ingredients or dietary restrictions, process them here too...
    
        return redirect()->route('recipes.index')->with('success', 'Recipe created successfully.');
    }

    /**
     * Display the specified recipe.
     */
    public function show(Recipe $recipe)
    {
        $recipe->load(['ingredients', 'dietaryRestrictions']);
        return view('recipes.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified recipe.
     */
    public function edit(Recipe $recipe)
    {
        $ingredients = Ingredient::all();
        $dietaryRestrictions = DietaryRestriction::all();
        $recipe->load(['ingredients', 'dietaryRestrictions']);
        
        return view('recipes.edit', compact('recipe', 'ingredients', 'dietaryRestrictions'));
    }

    /**
     * Update the specified recipe in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'prep_time' => 'required|integer|min:1',
            'cook_time' => 'required|integer|min:1',
            'servings' => 'required|integer|min:1',
            'instructions' => 'required|string',
            'ingredients' => 'sometimes|array',
            'ingredients.*' => 'exists:ingredients,id',
            'dietary_restrictions' => 'sometimes|array',
            'dietary_restrictions.*' => 'exists:dietary_restrictions,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }

        $recipe->update($request->only([
            'title', 'prep_time', 'cook_time', 'servings', 'instructions'
        ]));

        // Update ingredients with quantities
        if ($request->has('ingredients')) {
            $ingredientsData = [];
            foreach ($request->ingredients as $ingredientId) {
                $ingredientsData[$ingredientId] = [
                    'quantity' => $request->input('quantity_'.$ingredientId),
                    'unit' => $request->input('unit_'.$ingredientId)
                ];
            }
            $recipe->ingredients()->sync($ingredientsData);
        } else {
            $recipe->ingredients()->detach();
        }

        // Update dietary restrictions
        if ($request->has('dietary_restrictions')) {
            $recipe->dietaryRestrictions()->sync($request->dietary_restrictions);
        } else {
            $recipe->dietaryRestrictions()->detach();
        }

        return redirect()->route('recipes.show', $recipe->id)
                        ->with('success', 'Recipe updated successfully!');
    }

    /**
     * Remove the specified recipe from storage.
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return redirect()->route('recipes.index')
                        ->with('success', 'Recipe deleted successfully!');
    }

    /**
     * Search recipes based on query.
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        
        $results = Recipe::query()
            ->when($query, function($q) use ($query) {
                return $q->where('title', 'like', '%'.$query.'%')
                       ->orWhere('description', 'like', '%'.$query.'%')
                       ->orWhereHas('ingredients', function($q) use ($query) {
                           $q->where('name', 'like', '%'.$query.'%');
                       });
            })
            ->with('ingredients')
            ->paginate(9);
        
        return view('recipes.search', [
            'results' => $results,
            'query' => $query
        ]);
    }



    public function index()
    {
        $recipes = Recipe::query();
        
        if(request('search')) {
            $recipes->where('title', 'like', '%'.request('search').'%');
        }
        
        $recipes = $recipes->paginate(10);
        
        return view('recipes.index', compact('recipes'));
    }
}