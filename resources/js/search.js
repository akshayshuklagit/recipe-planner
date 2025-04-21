import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector('input[name="query"]');
    
    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            if (this.value.length > 2) {
                fetch(`/recipes/search?query=${this.value}`)
                    .then(response => response.text())
                    .then(html => {
                        document.getElementById('search-results').innerHTML = html;
                    });
            }
        });
    }
});


export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/js/search.js' // Add this line
            ],
            refresh: true,
        }),
    ],
});