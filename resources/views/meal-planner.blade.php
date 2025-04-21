@forelse($recipes ?? [] as $recipe)
    <div class="col">
        <div class="card h-100 recipe-card">
            <img src="{{ $recipe['image'] }}" class="card-img-top recipe-img" alt="{{ $recipe['title'] }}">
            <div class="card-body">
                <h5 class="card-title">{{ $recipe['title'] }}</h5>
                <p class="card-text">
                    <strong>Ready in:</strong> {{ $recipe['readyInMinutes'] }} mins<br>
                    <strong>Servings:</strong> {{ $recipe['servings'] }}
                </p>
                @if(isset($recipe['summary']))
                    <div class="recipe-summary">{!! Str::limit(strip_tags($recipe['summary']), 150) !!}</div>
                @endif
            </div>
            <div class="card-footer bg-white">
                <a href="{{ $recipe['sourceUrl'] ?? '#' }}" target="_blank" class="btn btn-outline-primary">View Recipe</a>
            </div>
        </div>
    </div>
@empty
    {{-- ... --}}
@endforelse