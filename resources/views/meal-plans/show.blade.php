@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>{{ $mealPlan->name ?? 'Meal Plan Details' }}</h1>
        <a href="{{ route('meal-plans.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back to Plans
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title">Plan Details</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Start Date:</strong> {{ $mealPlan->start_date->format('M d, Y') }}
                        </li>
                        <li class="list-group-item">
                            <strong>End Date:</strong> {{ $mealPlan->end_date->format('M d, Y') }}
                        </li>
                        <li class="list-group-item">
                            <strong>Created:</strong> {{ $mealPlan->created_at->diffForHumans() }}
                        </li>
                    </ul>
                </div>
                
                <div class="col-md-6">
                    <h5 class="card-title">Notes</h5>
                    <div class="card-text">
                        {{ $mealPlan->notes ?? 'No notes available' }}
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('meal-plans.calendar', $mealPlan) }}" 
                   class="btn btn-primary">
                    <i class="bi bi-calendar-week"></i> View Calendar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection