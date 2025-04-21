<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MealAIController extends Controller
{
    public function searchMeal(Request $request)
{
    $meal = $request->input('search');

    $prompt = "Give me ingredients and a step-by-step recipe to make $meal.";

    $response = Http::withToken(env('OPENAI_API_KEY'))->post('https://api.openai.com/v1/chat/completions', [
        'model' => 'gpt-3.5-turbo',
        'messages' => [
            ['role' => 'user', 'content' => $prompt]
        ],
        'max_tokens' => 1000,
    ]);

    if ($response->failed()) {
        return "OpenAI API request failed: " . $response->body();
    }

    $data = $response->json();

    // check if content is available
    if (!isset($data['choices'][0]['message']['content'])) {
        return "Invalid response from OpenAI: " . json_encode($data);
    }

    $recipe = $data['choices'][0]['message']['content'];

    return view('ai_result', compact('meal', 'recipe'));
}

}