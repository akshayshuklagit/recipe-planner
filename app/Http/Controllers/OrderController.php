<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'items' => 'required|array',
            'total' => 'required|numeric'
        ]);

        // Clear the cart
        session()->forget('cart');

        return response()->json([
            'success' => true,
            'redirect' => route('orders.success')
        ]);
    }

    public function success()
    {
        return view('orders.success');
    }
}