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

	public static function completion(string $message): Response
	{
		return Http::openai()
			->post('/chat/completions', [
				'model' => 'gpt-3.5-turbo',
				'messages' => [
					[
						'role' => 'system',
						'content' => 'You are a helpful assistant.',
					],
					[
						'role' => 'user',
						'content' => $message,
					],
				],
			]);
	}
}
