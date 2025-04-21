<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class ShoppinglistController extends Controller
{
    public function add(Request $request)
{
    $ingredients = $request->input('ingredients');

    // Store in session or DB, based on your design
    session()->put('shopping_list', $ingredients);

    return redirect()->back()->with('success', 'Ingredients added to shopping list!');
}

public function show()
{
    $shoppingList = session('shopping_list', []);

    return view('shopping-list.result', compact('shoppingList'));
}

  

public function generate(Request $request)
{
    $recipeIds = $request->input('recipes', []);
    $recipes = Recipe::with('ingredients')->whereIn('id', $recipeIds)->get();

    $shoppingList = [];

    foreach ($recipes as $recipe) {
        foreach ($recipe->ingredients as $ingredient) {
            $name = $ingredient->name;
            $qty = $ingredient->pivot->quantity;

            if (isset($shoppingList[$name])) {
                $shoppingList[$name] += floatval($qty); // Add quantity
            } else {
                $shoppingList[$name] = floatval($qty);
            }
        }
    }

    return view('shopping-list.result', compact('shoppingList'));
}

}
