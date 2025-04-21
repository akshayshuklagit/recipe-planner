@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="d-flex align-items-center mb-4">
                <h1 class="mb-0">Create New Recipe</h1>
                <div class="ms-auto">
                    <a href="{{ route('recipes.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Back to Recipes
                    </a>
                </div>
            </div>
            
            <form action="{{ route('recipes.store') }}" method="POST">
                @csrf
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <!-- Basic Information -->
                        <div class="mb-4">
                            <h4 class="mb-3 text-primary">
                                <i class="bi bi-info-circle"></i> Basic Information
                            </h4>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Recipe Title</label>
                                    <input type="text" name="title" class="form-control form-control-lg" required placeholder="e.g. Creamy Garlic Pasta">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-bold">Prep Time (minutes)</label>
                                    <input type="number" name="prep_time" class="form-control" required placeholder="15">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-bold">Cook Time (minutes)</label>
                                    <input type="number" name="cook_time" class="form-control" required placeholder="30">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-bold">Servings</label>
                                    <input type="number" name="servings" class="form-control" required placeholder="4">
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <!-- Ingredients Section -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-primary">
                                    <i class="bi bi-cart3"></i> Ingredients
                                </h4>
                                <small class="text-muted">Check ingredients you need</small>
                            </div>
                            
                            <div class="bg-light p-3 rounded">
                                @foreach($ingredients as $ingredient)
                                <div class="row g-2 mb-2 align-items-center">
                                    <div class="col-md-1">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" 
                                                name="ingredients[]" 
                                                value="{{ $ingredient->id }}" 
                                                id="ingredient{{ $ingredient->id }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-check-label" for="ingredient{{ $ingredient->id }}">
                                            {{ $ingredient->name }}
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" class="form-control form-control-sm" 
                                            name="quantity_{{ $ingredient->id }}" 
                                            placeholder="Qty" 
                                            min="1" 
                                            step="0.5">
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-select form-select-sm" name="unit_{{ $ingredient->id }}">
                                            <option value="g">Grams (g)</option>
                                            <option value="kg">Kilograms (kg)</option>
                                            <option value="ml">Milliliters (ml)</option>
                                            <option value="l">Liters (l)</option>
                                            <option value="tsp">Teaspoons (tsp)</option>
                                            <option value="tbsp">Tablespoons (tbsp)</option>
                                            <option value="unit">Units</option>
                                        </select>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <hr class="my-4">

                        <!-- Instructions -->
                        <div class="mb-4">
                            <h4 class="text-primary mb-3">
                                <i class="bi bi-list-ol"></i> Cooking Instructions
                            </h4>
                            <label class="form-label fw-bold">Step-by-step instructions</label>
                            <textarea name="instructions" class="form-control" rows="8" required 
                                placeholder="1. Chop the onions..
                                2. Heat oil in a pan...
                                3. Add garlic and sauté until fragrant..."></textarea>
                        </div>

                        <hr class="my-4">

                        <!-- Dietary Restrictions -->
                        <div class="mb-4">
                            <h4 class="text-primary mb-3">
                                <i class="bi bi-tags"></i> Dietary Tags
                            </h4>
                            <div class="d-flex flex-wrap gap-3">
                                @foreach($dietaryRestrictions as $restriction)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" 
                                        name="dietary_restrictions[]" 
                                        value="{{ $restriction->id }}" 
                                        id="restriction{{ $restriction->id }}">
                                    <label class="form-check-label badge bg-light text-dark border" 
                                        for="restriction{{ $restriction->id }}">
                                        {{ $restriction->name }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-5 text-center">
                            <button type="submit" class="btn btn-primary btn-lg px-5 py-3">
                                <i class="bi bi-save me-2"></i> Create Recipe
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .form-control, .form-select {
        border-radius: 8px;
    }
    .form-control:focus, .form-select:focus {
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
    }
    .card {
        border-radius: 12px;
    }
    textarea {
        min-height: 200px;
    }
    .badge {
        padding: 0.5em 0.8em;
        border-radius: 20px;
        font-weight: 500;
    }
    .form-check-input:checked + .badge {
        background-color: var(--bs-primary) !important;
        color: white !important;
    }
</style>
@endsection