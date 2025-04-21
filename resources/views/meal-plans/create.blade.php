@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Header Section -->
            <div class="text-center mb-5">
                <h1 class="display-5 fw-bold text-gradient mb-3">Create New Meal Plan</h1>
                <p class="lead text-muted">Organize your meals for the coming days</p>
            </div>

            <!-- Meal Plan Form -->
            <div class="card border-0 shadow-lg">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-journal-text me-2"></i> Plan Details</h5>
                </div>
                
                <form action="{{ route('meal-plans.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <!-- Plan Name -->
                        <div class="mb-4">
                            <label class="form-label fw-medium">Plan Name <span class="text-muted">(optional)</span></label>
                            <input type="text" name="name" class="form-control form-control-lg" 
                                   placeholder="e.g. 'Weekly Family Meals' or 'Keto Diet Plan'">
                        </div>
                        
                        <!-- Date Range -->
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Start Date</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                    <input type="date" name="start_date" 
                                           class="form-control form-control-lg" required>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label fw-medium">End Date</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                    <input type="date" name="end_date" 
                                           class="form-control form-control-lg" required>
                                </div>
                            </div>
                        </div>

                        <!-- Notes -->
                        <div class="mb-3">
                            <label class="form-label fw-medium">Notes</label>
                            <textarea name="notes" class="form-control" 
                                      rows="3" placeholder="Any special instructions or dietary requirements..."></textarea>
                        </div>
                    </div>
                    
                    <!-- Form Footer -->
                    <div class="card-footer bg-white border-top py-3">
                        <div class="d-flex justify-content-between">
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left"></i> Back
                            </a>
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="bi bi-save me-2"></i> Create Plan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .text-gradient {
        background: linear-gradient(to right, #4f46e5, #10b981);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }
    .card {
        border-radius: 0.75rem;
        overflow: hidden;
    }
    .form-control-lg {
        padding: 0.75rem 1rem;
    }
    .input-group-text {
        background-color: #f8f9fa;
    }
</style>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
@endsection