<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageUpdateRequest;
use App\Models\Block;
use App\Models\StringData;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class StringDataController extends Controller
{
    public function stringUpdate(int $block): JsonResponse
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

    public function imageUpdate(Block $block, ImageUpdateRequest $request): JsonResponse
    {
        $properties = $block->class->dataProperties()[$request->get('key')];
        $siteId = $block->site_id;
        $path = "images/sites/$siteId/blocks/{$block->id}";

        if (! Storage::directoryExists($path)) {
            Storage::makeDirectory($path);
        }

        if ($request->has('link')) {
            $image = Image::make($request->get('link'));

            $image->fit($properties['width'], $properties['height'])
                ->save(storage_path("app/public/$path/{$request->get('key')}.webp"), 80, 'webp');

        } elseif ($request->has('image')) {

            Image::make($request->image->path())
                ->fit($properties['width'], $properties['height'])
                ->save(storage_path("app/public/$path/{$request->get('key')}.webp"), 80, 'webp');
        }

        $data = StringData::updateOrCreate(
            [
                'block_id' => $block->id,
                'key' => $request->get('key'),
            ],
            [
                'value' => Storage::url("$path/{$request->get('key')}.webp"),
            ]
        );

        return response()->json($data->value);
    }
}
