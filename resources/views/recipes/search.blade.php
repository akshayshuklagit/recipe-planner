@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold mb-3">Transform Your Meal Planning</h1>
        <p class="lead text-muted mb-4">Discover recipes, create meal plans, and generate shopping lists effortlessly</p>
        
        <form action="{{ route('recipes.search') }}" method="GET" class="p-2 w-50 mx-auto mt-4">
            <div class="input-group input-group-lg shadow-sm">
                <input type="text" name="query" value="{{ request('query') }}" 
                       class="form-control border-2 border-success" 
                       placeholder="Enter recipe name..." 
                       aria-label="Search recipes"
                       required>
                <button type="submit" class="btn btn-success px-4">
                    <i class="bi bi-search me-1"></i> Search
                </button>
            </div>
        </form>
    </div>

    <!-- Add this where you want results to appear -->
<div id="search-results" class="row g-4 mt-3">
    <!-- Results will appear here dynamically -->
</div>

    @if(isset($results))
        @include('recipes.search-results')
    @endif
</div>
@endsection