@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>My Meal Plans</h1>
        <a href="{{ route('meal-plans.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> New Plan
        </a>
    </div>

    @if($mealPlans->isEmpty())
        <div class="alert alert-info">No meal plans found. Create your first one!</div>
    @else
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($mealPlans as $plan)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $plan->name ?? 'Unnamed Plan' }}</h5>
                        <p class="card-subtitle text-muted mb-2">
                            {{ $plan->start_date->format('M j') }} - {{ $plan->end_date->format('M j') }}
                        </p>
                        
                        <div class="mt-3">
                            <a href="{{ route('meal-plans.show', $plan) }}" 
                               class="btn btn-sm btn-outline-primary">
                                View Details
                            </a>
                            <a href="{{ route('meal-plans.calendar', $plan) }}" 
                               class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-calendar-week"></i> Calendar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $mealPlans->links() }}
        </div>
    @endif
</div>
@endsection