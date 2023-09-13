<?php

namespace App\Http\Controllers;

use App\Services\OpenAI\OpenAIService;
use Illuminate\Http\Request;

class OpenAIController extends Controller
{
    public function request(Request $request, OpenAIService $service)
    {
        return $service->complete($request->get('request'));
    }

    public function firstPage(Request $request, OpenAIService $service)
    {
		$systemMessage = "Формат ответа JSON: {\"title\": \"Заголовок\", \"subtitle\": \"Подзаголовок\", \"button\": \"Текст кнопки\"}";
			// Заголовок не длиннее {$request->max_title} слов.
			// Подзаголовок не длиннее {$request->max_subtitle} слов.
			// Текст кнопки не длиннее {$request->max_button} слов.";

		$userMessage = "Напиши  связку: заголовок - подзаголовок - текст кнопки целевого действия для лендинга.
			Цель лендинга: {$request->goal}. ";

			if (!is_null($request->ta)) {
				$userMessage .= "Целевая аудитория лендинга: {$request->ta}. ";
			}
			if (!is_null($request->benefit)) {
				$userMessage .= "Описание основного предложения или преимущества: {$request->benefit}. ";
			}
			if (!is_null($request->action)) {
				$userMessage .= "Целевое действие на лендинге: {$request->action}. ";
			}
			if (!is_null($request->message)) {
				$userMessage .= "Общее сообщение, которое нужно донести до посетителей: {$request->message}. ";
			}
			if (!is_null($request->keywords)) {
				$userMessage .= "Используй следующие ключевые слова или фразы: {$request->keywords}. ";
			}
			if (!is_null($request->style)) {
				$userMessage .= "Текст в следующем стиле: {$request->style}. ";
			}
			if (!is_null($request->additionally)) {
				$userMessage .= "Дополнительные требования: {$request->additionally}. ";
			}
			
		$response = $service->firstPageBundle($userMessage, $systemMessage, $request->n);

		$choices =  $response->json('choices');
		$results = [];

		foreach ($choices as $choice) {
			$content = json_decode($choice['message']['content']);

			if (is_null($content)) {
				clock($choice);
				continue;
			}

			$results[] = $content;
		}

		return response()->json($results);
    }
}
