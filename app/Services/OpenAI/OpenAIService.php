<?php

namespace App\Services\OpenAI;

use Illuminate\Http\Client\Response;

class OpenAIService
{
    public function __construct(public OpenAIApi $api)
    {
    }

    public function complete(string $message, string $model = 'gpt-3.5-turbo')
    {
        $response = $this->api->completion($message, '', 1, presencePenalty: 1, frequencyPenalty: 1, model: $model);

        return $response->json();
    }

    public function firstPageBundle(string $userMessage, string $systemMessage, int $n = 1, string $model = 'gpt-3.5-turbo'): Response
    {
        $response = $this->api->completion($userMessage, $systemMessage, n: $n, model: $model);

        return $response;
    }
}
