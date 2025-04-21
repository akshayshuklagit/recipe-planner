{{-- resources/views/meal-plans/partials/recipe-card.blade.php --}}
<div class="recipe-card" 
     draggable="{{ $draggable ?? 'false' }}" 
     ondragstart="dragRecipe(event)"
     data-recipe-id="{{ $recipe->id }}">
    <div class="card mb-2">
        <div class="card-body p-2">
            <h6 class="card-title mb-1">{{ $recipe->title }}</h6>
            <div class="badges mb-1">
                @foreach($recipe->dietaryRestrictions as $restriction)
                <span class="badge bg-secondary">{{ $restriction->name }}</span>
                @endforeach
            </div>
            <div class="servings">
                <small class="text-muted">
                    {{ $recipe->pivot->servings }} servings
                </small>
            </div>
        </div>
    </div>
</div>

{{-- resources/views/meal-plans/partials/add-recipe-modal.blade.php --}}
<div class="modal fade" id="addRecipeModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Recipe to Plan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="addRecipeForm">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Recipe</label>
                        <select name="recipe_id" class="form-select" required>
                            @foreach($availableRecipes as $recipe)
                            <option value="{{ $recipe->id }}">{{ $recipe->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" name="date" class="form-control" 
                                   min="{{ $startDate->format('Y-m-d') }}"
                                   max="{{ $endDate->format('Y-m-d') }}"
                                   required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Meal Type</label>
                            <select name="meal_type" class="form-select" required>
                                <option value="breakfast">Breakfast</option>
                                <option value="lunch">Lunch</option>
                                <option value="dinner">Dinner</option>
                                <option value="snack">Snack</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Servings</label>
                        <input type="number" name="servings" 
                               class="form-control" value="1" min="1" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Recipe</button>
                </form>
            </div>
        </div>
    </div>
</div>