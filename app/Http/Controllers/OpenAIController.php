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
}
