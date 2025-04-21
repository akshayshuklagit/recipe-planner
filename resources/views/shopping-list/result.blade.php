@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-8 bg-white rounded-2xl shadow-xl mt-10">

    <h2 class="text-3xl font-extrabold mb-6 text-pink-600 flex items-center gap-2">
        🛒 Your Shopping List
    </h2>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg shadow">
            {{ session('success') }}
        </div>
    @endif

    @if (count($shoppingList))
        <ul class="list-disc pl-6 space-y-3 text-gray-800 text-lg">
            @foreach ($shoppingList as $item => $quantity)
                <li class="flex justify-between items-center">
                    <span>{{ ucfirst($item) }}</span>
                    <span class="font-semibold text-pink-500">{{ $quantity }}</span>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-gray-500 text-center text-lg mt-6">No ingredients found.</p>
    @endif


        <a href="{{ url()->previous() }}" class="text-pink-600 hover:underline text-lg">
            ← Back to Recipes
        </a>
    </div>
</div>
@endsection
