<?php

namespace App\Http\Controllers;

use App\Services\NextLeg\NextLegService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NextLegController extends Controller
{
    public function __construct(private NextLegService $service)
    {
    }

    public function imagine(Request $request): JsonResponse
    {
        $messageId = $this->service->imagine(
            $request->get('prompt'),
            $request->get('chaos'),
            $request->get('stylize'),
            $request->get('weird'),
            $request->get('quality'),
            $request->get('no'),
            $request->get('aspect'),
        );

        return response()->json(['messageId' => $messageId]);
    }

    public function getMessage(Request $request): JsonResponse
    {
        $response = $this->service->getMessage($request->get('messageId'));

        return response()->json($response);
    }

    public function pushButton(Request $request): JsonResponse
    {
        $messageId = $this->service->button($request->get('buttonMessageId'), $request->get('button'));

        return response()->json(['messageId' => $messageId]);
    }
}
