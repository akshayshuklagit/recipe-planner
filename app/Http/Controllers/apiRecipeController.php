<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class apiRecipeController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
    
        // Call TheMealDB API
        $response = Http::get("https://www.themealdb.com/api/json/v1/1/search.php", [
            's' => $query
        ]);
    
        // Get JSON response as an array
        $data = $response->json();
    
       
        $recipes = is_array($data['meals']) ? $data['meals'] : [];

       
    
        return view('externalrecipe.index', compact('recipes', 'query'));
    }

public function show($id)
{
    $response = Http::get("https://www.themealdb.com/api/json/v1/1/lookup.php?i={$id}");
    $data = $response->json();

    if (!empty($data['meals'][0])) {
        $recipe = $data['meals'][0];
        return view('externalrecipe.show', compact('recipe'));
    }

    return redirect()->route('externalrecipe.search')->with('error', 'Recipe not found.');
}
};
