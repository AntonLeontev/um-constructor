<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlockCreateRequest;
use App\Http\Requests\BlocksViewsRequest;
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

        $html = $block->class->view($block->getSavedData(), $block);

        $block->html = $html;

        return response()->json($block, Response::HTTP_CREATED);
    }

    public function destroy(Block $block): JsonResponse
    {
        $block->delete();

        return response()->json('', Response::HTTP_NO_CONTENT);
    }

    public function inputView(Block $block): JsonResponse
    {
        $html = $block->class->inputView($block->getSavedData());

        return response()->json(['html' => $html]);
    }

    public function preview(Block $block): JsonResponse
    {
        $html = $block->class->view($block->getSavedData(), $block);

        return response()->json(['html' => $html]);
    }

    public function views(BlocksViewsRequest $request): JsonResponse
    {
        $data = [];

        foreach ($request->blocks_ids as $id) {
            $block = Block::find($id);

            $html = $block->class->view($block->getSavedData(), $block);

            $data[] = ['id' => $id, 'html' => $html];
        }

        return response()->json($data);
    }
}
