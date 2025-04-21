@extends('layouts.app')

@section('content')
<div class="container py-4">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="mb-0 fw-bold">🛒 Your Cart</h1>
            <p class="text-muted mb-0">Review your selected recipes</p>
        </div>
        <a href="{{ route('recipes.index') }}" class="btn btn-outline-primary">
            <i class="bi bi-arrow-left me-1"></i> Continue Shopping
        </a>
    </div>

    @if(session('cart') && count(session('cart')) > 0)
        <!-- Cart Items -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    @php $total = 0; @endphp
                    @foreach($cart as $id => $item)
                        @php $total += ($item['price'] ?? 0) * ($item['quantity'] ?? 1); @endphp
                        <div class="list-group-item border-0">
                            <div class="d-flex align-items-center">
                                <!-- Recipe Info -->
                                <div class="flex-grow-1">
                                    <h5 class="mb-1">{{ $item['title'] ?? 'No Title' }}</h5>
                                    <p class="text-muted small mb-2">{{ $item['description'] ?? 'No description available' }}</p>
                                </div>
                                
                                <!-- Remove Button -->
                                <div class="flex-shrink-0 ms-3">
                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
           
        
        <!-- Action Buttons -->
        <div class="d-flex justify-content-between" >
            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-danger">
                    <i class="bi bi-trash me-1"></i> Clear Cart
                </button>
            </form>
            
            <button  type="button" class="btn btn-success btn-lg px-4" data-bs-toggle="modal" data-bs-target="#orderPlacedModal">
                <i class="bi bi-check-circle me-1"></i> Place Order
            </button>
        </div>
    @else
        <!-- Empty Cart State -->
        <div class="card border-0 shadow-sm text-center py-5">
            <i class="bi bi-cart-x text-muted" style="font-size: 3rem;"></i>
            <h4 class="my-3">Your cart is empty</h4>
            <p class="text-muted mb-3">You haven't added any recipes to your cart yet</p>
            <a href="{{ route('recipes.index') }}" class="btn btn-primary px-4">
                <i class="bi bi-arrow-left me-1"></i> Browse Recipes
            </a>
        </div>
    @endif
</div>

<!-- Order Placed Modal -->
<div class="modal fade" id="orderPlacedModal" tabindex="-1" aria-labelledby="orderPlacedLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-body text-center p-5">
        <div class="mb-3">
          <i class="bi bi-check-circle-fill text-success" style="font-size: 3rem;"></i>
        </div>
        <h4>Order Placed Successfully!</h4>
        <p class="text-muted">Your order has been received and will be processed shortly.</p>
        <div class="spinner-border text-primary mt-3" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <p class="text-muted mt-2">Redirecting to home page...</p>
        <a href="{{ route('recipes.index') }}" class="btn btn-primary px-4">
                <i class="bi bi-arrow-left me-1"></i> Browse Recipes
            </a>
      </div>
    </div>
  </div>
</div>


<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">

<style>
    .list-group-item {
        padding: 1.25rem;
        transition: all 0.2s;
    }
    .list-group-item:hover {
        background-color: #f8f9fa;
    }
    .card {
        border-radius: 0.75rem;
    }
    #orderPlacedModal .modal-content {
        border: none;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
</style>
@endsection




