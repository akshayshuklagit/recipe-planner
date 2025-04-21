<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class AIController extends Controller
{
    public function searchRecipe(Request $request)
    {
        $query = $request->input('q');

        if (!$query) {
            return redirect()->back()->with('error', 'Please enter a recipe name.');
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => "List only the ingredients required to make {$query}. Do not include instructions or steps.",
                ],
            ],
            'temperature' => 0.7,
        ]);

        $ingredients = $response['choices'][0]['message']['content'] ?? 'No response received.';

        return view('ai_result', compact('query', 'ingredients'));
    }
}
