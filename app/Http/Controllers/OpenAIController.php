<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Services\OpenAI\OpenAIService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OpenAIController extends Controller
{
    public function __construct(private OpenAIService $service)
    {
    }

    public function request(Request $request)
    {
        return $this->service->complete($request->get('request'), $request->model);
    }

    public function blockTextGeneration(Block $block, Request $request): JsonResponse
    {
        [$userMessage, $systemMessage] = $block->class->textGeneration($request);

        $response = $this->service->completion($userMessage, $systemMessage, $request->get('n'));

        return response()->json($response);
    }

    public function firstPage(Request $request)
    {
        $systemMessage = 'Формат ответа JSON: {"title": "Заголовок", "subtitle": "Подзаголовок", "button": "Текст кнопки"}';
        // Заголовок не длиннее {$request->max_title} слов.
        // Подзаголовок не длиннее {$request->max_subtitle} слов.
        // Текст кнопки не длиннее {$request->max_button} слов.";

        $userMessage = "Напиши  связку: заголовок - подзаголовок - текст кнопки целевого действия для лендинга.
			Цель лендинга: {$request->goal}. ";

        if (! is_null($request->ta)) {
            $userMessage .= "Целевая аудитория лендинга: {$request->ta}. ";
        }
        if (! is_null($request->benefit)) {
            $userMessage .= "Описание основного предложения или преимущества: {$request->benefit}. ";
        }
        if (! is_null($request->action)) {
            $userMessage .= "Целевое действие на лендинге: {$request->action}. ";
        }
        if (! is_null($request->message)) {
            $userMessage .= "Общее сообщение, которое нужно донести до посетителей: {$request->message}. ";
        }
        if (! is_null($request->keywords)) {
            $userMessage .= "Используй следующие ключевые слова или фразы: {$request->keywords}. ";
        }
        if (! is_null($request->style)) {
            $userMessage .= "Текст в следующем стиле: {$request->style}. ";
        }
        if (! is_null($request->additionally)) {
            $userMessage .= "Дополнительные требования: {$request->additionally}. ";
        }

        $response = $this->service->firstPageBundle($userMessage, $systemMessage, $request->n, $request->model ?? 'gpt-3.5-turbo');

        $choices = $response->json('choices');
        $results = [];

        foreach ($choices as $choice) {
            $content = json_decode($choice['message']['content']);

            if (is_null($content)) {
                //TODO remove log
                clock($choice);

                continue;
            }

            $results[] = $content;
        }

        return response()->json($results);
    }
}
