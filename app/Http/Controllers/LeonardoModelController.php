<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class LeonardoModelController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(leo_models());
    }
}
