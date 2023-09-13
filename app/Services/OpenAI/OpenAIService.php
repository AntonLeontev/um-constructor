<?php

namespace App\Services\OpenAI;

use Illuminate\Http\Client\Response;

class OpenAIService
{
    public function __construct(public OpenAIApi $api)
    {
    }

    public function complete(string $message)
    {
        $response = $this->api->completion($message, '', 1, presencePenalty: 1, frequencyPenalty: 1);

        return $response->json();
    }

    public function firstPageBundle(string $userMessage, string $systemMessage, int $n = 1): Response
    {
        $response = $this->api->completion($userMessage, $systemMessage, n: $n);

        return $response;
    }
}
