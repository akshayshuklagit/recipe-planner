@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#28a745" class="bi bi-check-circle-fill mb-4" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.97 10.97l4.242-4.242-1.414-1.414L6.97 8.586 5.2 6.814l-1.414 1.414L6.97 10.97z"/>
                    </svg>
                    <h2 class="mb-3">Order Placed Successfully!</h2>
                    <p class="text-muted mb-4">Your order has been received and is being processed.</p>
                    <a href="{{ route('recipes.index') }}" class="btn btn-primary px-4">
                        <i class="bi bi-arrow-left me-1"></i> Back to Recipes
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection