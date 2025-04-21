@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-center">{{ $meal_plan->name }} Calendar 🗓️</h2>
    
    <div class="row">
        <!-- Left Column: Calendar Grid -->
        <div class="col-md-8">
            <div class="calendar-grid row row-cols-1 g-4">
                @foreach($calendarData as $date => $mealTypes)
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white">
                                {{ \Carbon\Carbon::parse($date)->format('D, M j') }}
                            </div>
                            <div class="card-body">
                                @foreach(['breakfast', 'lunch', 'dinner', 'snack'] as $type)
                                    <div class="mb-3">
                                        <h6 class="fw-bold text-capitalize">{{ $type }}</h6>
                                        @isset($mealTypes[$type])
                                            <ul class="list-group list-group-flush">
                                                @foreach($mealTypes[$type] as $recipe)
                                                    <li class="list-group-item">
                                                        🍽️ {{ $recipe->name }}
                                                        <small class="text-muted">({{ $recipe->pivot->servings }} servings)</small>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p class="text-muted">No recipes planned</p>
                                        @endisset
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Right Column: Available Recipes -->
        <div class="col-md-4">
            <div class="available-recipes sticky-top">
                <h4 class="mb-3">Available Recipes ({{ $availableRecipes->count() }})</h4>

                @if($availableRecipes->isEmpty())
                    <div class="alert alert-info">
                        No available recipes. 
                        <a href="{{ route('recipes.create') }}">Create new recipe</a>
                    </div>
                @else
                    <div class="recipe-list d-grid gap-2">
                        @foreach($availableRecipes as $recipe)
                            <div class="card shadow-sm p-3 recipe-card"
                                 draggable="true"
                                 ondragstart="dragRecipe(event)"
                                 data-recipe-id="{{ $recipe->id }}">
                                <div class="d-flex justify-content-between align-items-center">
                                    <strong>{{ $recipe->title }}</strong>
                                    <span class="badge bg-secondary">{{ $recipe->cook_time }} mins</span>
                                </div>
                                <small class="text-muted">Drag to calendar</small>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
    .calendar-grid {
        max-height: 80vh;
        overflow-y: auto;
    }
    .recipe-card {
        background-color: #f8f9fa;
        cursor: grab;
        transition: background-color 0.2s;
    }
    .recipe-card:hover {
        background-color: #e9ecef;
    }
</style>

<script>
    function dragRecipe(event) {
        event.dataTransfer.setData("recipeId", event.target.dataset.recipeId);
    }

    // You can add more logic here to drop onto calendar days
</script>
@endsection
