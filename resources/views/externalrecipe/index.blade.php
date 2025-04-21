<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>🍳Meal Planner</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-b from-yellow-50 to-pink-100 min-h-screen font-sans">

    <div class="max-w-4xl mx-auto px-4 py-8">
        <!-- Navigation -->

        <h1 class="text-4xl font-bold text-center text-pink-600 mb-8">🍳Meal Planner</h1>

        <!-- Search Form -->
        <form action="{{ route('externalrecipe.search') }}" method="GET" class="flex items-center justify-center gap-4 mb-10">
            <input 
                type="text" 
                name="query" 
                placeholder="Search for chicken, pasta, salad..." 
                value="{{ request('query') }}" 
                required
                class="w-2/3 px-4 py-2 rounded-full border border-pink-300 focus:outline-none focus:ring-2 focus:ring-pink-400"
            >
            <button 
                type="submit" 
                class="bg-pink-500 text-white px-6 py-2 rounded-full hover:bg-pink-600 transition">
                Search
            </button>
        </form>

        <!-- Results -->
        @if (isset($query))
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Results for "<span class="text-pink-600">{{ $query }}</span>"</h2>
        @endif

        @if (!empty($recipes))
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                @foreach ($recipes as $recipe)
                <a href="{{ route('externalrecipe.show', $recipe['idMeal']) }}">
                    <div class="bg-white shadow-lg rounded-2xl overflow-hidden transition transform hover:-translate-y-1 hover:shadow-xl">
                        <img src="{{ $recipe['strMealThumb'] }}" alt="{{ $recipe['strMeal'] }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-bold text-pink-600 mb-1">{{ $recipe['strMeal'] }}</h3>
                            <p class="text-sm text-gray-500 mb-2"><strong>Category:</strong> {{ $recipe['strCategory'] }}</p>
                            <p class="text-gray-700 text-sm">{{ \Illuminate\Support\Str::limit($recipe['strInstructions'], 120) }}</p>
                            <a href="{{ $recipe['strSource'] ?? '#' }}" target="_blank" class="text-sm text-pink-500 mt-2 inline-block hover:underline">
                                View Recipe 🔗
                            </a>
                        </div>
                    </div>
</a>
                @endforeach
            </div>
        @elseif(isset($query))
            <div class="text-center text-gray-600 mt-10">
                <p>No recipes found for "<span class="font-semibold">{{ $query }}</span>".</p>
                <p class="mt-2">Try searching for things like <span class="text-pink-500">"chicken"</span>, <span class="text-pink-500">"egg"</span>, <span class="text-pink-500">"pasta"</span> etc.</p>
            </div>
        @else
            <div class="text-center text-gray-500">
                <p>Type something above to search for recipes!</p>
            </div>
        @endif
    </div>
    <script src="https://cdn.tailwindcss.com"></script>

</body>
</html>
