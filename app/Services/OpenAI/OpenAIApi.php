<?php

namespace App\Services\OpenAI;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class OpenAIApi
{
    public static function models(): Response
    {
        return Http::openai()->get('/models');
    }

    public static function completion(
        string $userMessage,
        string $systemMessage = '',
        int|float $temperature = 1.3,
        int $n = 1,
        int|float $maxTokens = 1000,
        int|float $presencePenalty = 2,
        int|float $frequencyPenalty = 2,
        string $model = 'gpt-3.5-turbo',
    ): Response {
        return Http::openai()
            ->post('/chat/completions', [
                'model' => $model,
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => $systemMessage,
                    ],
                    [
                        'role' => 'user',
                        'content' => $userMessage,
                    ],
                ],
                'temperature' => $temperature,
                'n' => $n,
                'max_tokens' => $maxTokens,
                'presence_penalty' => $presencePenalty,
                'frequency_penalty' => $frequencyPenalty,
            ]);
    }
}
