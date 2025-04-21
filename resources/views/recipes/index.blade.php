@extends('layouts.app')

@section('content')
<div class="container py-4 animate__animated animate__fadeIn">
    <h1 class="text-center mb-4 display-4 fw-bold text-gradient">Recipes Collection</h1>

    <!-- New Recipe button with animation -->
    <div >
        <div class="card-body p-5 text-center">
            <h3 class="card-title mb-4">Create New Recipe</h3>
            <div class="recipe-placeholder bg-light rounded-3 p-4 mb-4">
                <div class="d-flex flex-column align-items-center">
                    <i class="bi bi-plus-circle-fill text-primary" style="font-size: 3rem;"></i>
                    <p class="mt-3 mb-0">Add your own delicious creation</p>
                </div>
            </div>
            <a href="{{ route('recipes.create') }}" class="btn btn-primary btn-lg px-5 py-3 rounded-pill">
                <i class="bi bi-plus-lg me-2"></i> Start Creating
            </a>
        </div>
    </div>
    <div class="row g-4">
    @foreach($recipes as $recipe)
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-lg rounded-4 overflow-hidden animate__animated animate__fadeInUp" style="animation-delay: {{ $loop->index * 0.1 }}s">
                <!-- Image/placeholder -->
                <div class="card-img-top bg-light d-flex justify-content-center align-items-center" style="height: 200px;">
                    <i class="bi bi-egg-fried text-secondary" style="font-size: 3rem;"></i>
                </div>

                <!-- Body Content -->
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-gradient mb-2">{{ $recipe->title }}</h5>
                    <p class="text-muted small mb-2"><i class="bi bi-hourglass-split me-1"></i>Prep: {{ $recipe->prep_time }} | Cook: {{ $recipe->cook_time }}</p>
                    <p class="text-muted small mb-2"><i class="bi bi-people-fill me-1"></i>Servings: {{ $recipe->servings }}</p>

                    <div class="mb-3">
                        <p class="card-text small text-truncate" style="max-height: 60px; overflow: hidden;">
                            {{ Str::limit(strip_tags($recipe->instructions), 100) }}
                        </p>
                    </div>

                    <div class="mt-auto">
                        <a href="{{ route('recipes.show', $recipe->id) }}" class="btn btn-outline-primary w-100 rounded-pill mb-2">
                            <i class="bi bi-info-circle me-1"></i> View Details
                        </a>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- Pagination Centered -->
<div class="mt-5 d-flex justify-content-center">
    {{ $recipes->links() }}
</div>


    
    </div>

    <!-- Pagination with centered alignment -->
    <div class="mt-5 d-flex justify-content-center">
        {{ $recipes->links() }}
    </div>
</div>

<style>
    /* Custom styles */
    <style>
    .text-gradient {
        background: linear-gradient(to right, #16a34a, #2563eb);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .hover-effect {
        transition: all 0.3s ease;
        transform: translateY(0);
    }

    .hover-effect:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
    }

    .card {
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .card .card-title {
        font-weight: 600;
    }

    .text-gradient {
        background: linear-gradient(to right, #4ade80, #3b82f6);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }
    
    .hover-effect {
        transition: all 0.3s ease;
        transform: translateY(0);
    }
    
    .hover-effect:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }
    
    .card {
        transition: all 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
    }
    
    /* Animation for the page load */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    .animate__animated {
        animation-duration: 1s;
    }
</style>

<!-- Include Animate.css for animations -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<!-- Optional: Include Bootstrap Icons if not already included -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
@endsection