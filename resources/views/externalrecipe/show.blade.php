<!DOCTYPE html>
<html>
<head>
    <title>{{ $recipe['strMeal'] }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-yellow-50 text-gray-800">

<div class="max-w-4xl mx-auto p-6">
    <a href="{{ route('externalrecipe.search') }}" class="text-pink-500 underline mb-4 inline-block">← Back to search</a>

    <h1 class="text-3xl font-bold text-pink-600 mb-4">{{ $recipe['strMeal'] }}</h1>
    <img src="{{ $recipe['strMealThumb'] }}" class="rounded-lg shadow mb-6 w-full max-h-[400px] object-cover">

    <p><strong>Category:</strong> {{ $recipe['strCategory'] }}</p>
    <p><strong>Area:</strong> {{ $recipe['strArea'] }}</p>
    <p><strong>Tags:</strong> {{ $recipe['strTags'] ?? 'None' }}</p>

    <h2 class="text-xl font-semibold mt-6 mb-2">🧂 Ingredients</h2>
    <form action="{{ route('shopping-list.add') }}" method="POST">
        @csrf
        <ul class="list-disc list-inside mb-4">
            @for ($i = 1; $i <= 20; $i++)
                @php
                    $ingredient = $recipe['strIngredient' . $i];
                    $measure = $recipe['strMeasure' . $i];
                @endphp
                @if ($ingredient && $ingredient != "")
                    <li>
                        <input type="hidden" name="ingredients[]" value="{{ $ingredient }} - {{ $measure }}">
                        {{ $ingredient }} - {{ $measure }}
                    </li>
                @endif
            @endfor
        </ul>

        <button type="submit" class="bg-pink-500 text-white px-4 py-2 rounded-full hover:bg-pink-600 transition">
            🛒 Add Ingredients to Shopping List
        </button>
    </form>

    <h2 class="text-xl font-semibold mt-6 mb-2">📖 Instructions</h2>
    <p class="leading-relaxed">{{ $recipe['strInstructions'] }}</p>

    @if ($recipe['strYoutube'])
        <h2 class="text-xl font-semibold mt-6 mb-2">🎥 Video Tutorial</h2>
        <iframe width="100%" height="315" src="{{ str_replace('watch?v=', 'embed/', $recipe['strYoutube']) }}" frameborder="0" allowfullscreen></iframe>
    @endif
 
    <a href="{{ route('shopping-list.result') }}" class="bg-green-600 text-white px-4 py-2 rounded-full hover:bg-pink-600 transition">🛍️ View Shopping List</a>

</div>
</body>
</html>
