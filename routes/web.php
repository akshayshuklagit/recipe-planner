<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\MealPlanController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\apiRecipeController;
use App\Http\Controllers\ShoppingListController;


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\AIController;
use App\Http\Controllers\MealAIController;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Http\Request;



// Home Route
Route::get('/', function () {
    return view('home');
});

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
});

// Authenticated Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Recipes
    Route::resource('recipes', RecipeController::class);
    Route::get('/recipes/search', [RecipeController::class, 'search'])->name('recipes.search');
    Route::post('/recipes/search', [RecipeController::class, 'searchResults'])->name('recipes.search-results');

    // Meal Plans
    Route::resource('meal-plans', MealPlanController::class)->except(['edit', 'update', 'destroy']);

    Route::prefix('meal-plans/{meal_plan}')->group(function () {
        Route::get('/calendar', [MealPlanController::class, 'calendar'])->name('meal-plans.calendar');
        Route::post('/recipes', [MealPlanController::class, 'addRecipe'])->name('meal-plans.add-recipe');
        Route::put('/recipes/{recipe}', [MealPlanController::class, 'updateRecipePosition'])->name('meal-plans.update-recipe-position');
    });

    // Logout
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

// Cart Routes
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/clear', [CartController::class, 'clear'])->name('cart.clear');
});


// Search Routes
Route::get('/search-recipe', [RecipeController::class, 'search'])->name('search.recipe');

// Static/Dummy Meal Planning Pages
Route::get('/meal-planning', fn() => view('meal_planning'))->name('meal.planning');

//Recipe Categories
Route::get('/recipes/breakfast', fn() => 'Breakfast recipes coming soon!')->name('recipes.breakfast');
Route::get('/recipes/lunch', fn() => 'Lunch recipes coming soon!')->name('recipes.lunch');
Route::get('/recipes/dinner', fn() => 'Dinner recipes coming soon!')->name('recipes.dinner');

// Replace these:
// Route::get('/recipes/api-search-form', fn() => view('recipes.api-search-form'))->name('recipes.api-search-form');
Route::get('/recipes/api-search', [RecipeController::class, 'apiSearch'])->name('recipes.api-search');

// Add this near your other controller use statements at the top
use App\Http\Controllers\OrderController;

// Cart routes - make sure they're properly defined (you have multiple definitions)
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');
});

// Order routes - add this inside your auth middleware group
Route::middleware(['auth', 'verified'])->group(function () {
    // ... your existing auth routes ...
    
    // Order routes
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/success', [OrderController::class, 'success'])->name('orders.success');
});


Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');

Route::get('/recipess/search', [apiRecipeController::class, 'search'])->name('externalrecipe.search');
Route::get('/recipess/{id}', [apiRecipeController::class, 'show'])->name('externalrecipe.show');

Route::post('/shopping-list', [ShoppingListController::class, 'generate'])->name('shopping-list.generate');

Route::post('/shopping-list/add', [ShoppingListController::class, 'add'])->name('shopping-list.add');
  

Route::get('/shopping-list', [ShoppingListController::class, 'show'])->name('shopping-list.result');

