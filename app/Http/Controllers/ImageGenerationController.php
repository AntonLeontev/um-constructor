<?php

namespace App\Http\Controllers;

use App\Services\LeonardoAI\LeonardoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ImageGenerationController extends Controller
{
    public function __construct(private LeonardoService $service)
    {
    }

    public function imagine(Request $request): JsonResponse
    {
        $messageId = $this->service->imagine(
            $request->get('prompt'),
            $request->get('width'),
            $request->get('height'),
        );

        return response()->json(['messageId' => $messageId]);
    }

    public function getMessage(Request $request): JsonResponse
    {
        $response = $this->service->getGeneration($request->get('messageId'));

        return response()->json($response);
    }
}
