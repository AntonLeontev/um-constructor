<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlockCreateRequest;
use App\Models\Block;
use App\Models\Site;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class BlockController extends Controller
{
    public function index(Site $site): JsonResponse
    {
        return response()->json($site->blocks);
    }

    public function store(BlockCreateRequest $request, Site $site): JsonResponse
    {
        $block = Block::create($request->validated());

        return response()->json($block, Response::HTTP_CREATED);
    }

    public function destroy(Block $block): JsonResponse
    {
        $block->delete();

        return response()->json('', Response::HTTP_NO_CONTENT);
    }
}
