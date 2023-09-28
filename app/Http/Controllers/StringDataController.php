<?php

namespace App\Http\Controllers;

use App\Models\StringData;
use Illuminate\Http\JsonResponse;

class StringDataController extends Controller
{
    public function update(int $block): JsonResponse
    {
        $data = StringData::updateOrCreate(
            [
                'block_id' => $block,
                'key' => request('key'),
            ],
            [
                'value' => request('value'),
            ]
        );

        return response()->json($data);
    }
}
