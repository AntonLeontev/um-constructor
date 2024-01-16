<?php

namespace App\Services\LeonardoAI;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class LeonardoApi
{
    public static function imagine(
        string $prompt,
        int $width,
        int $height,
        bool $alchemy = null,
        ?int $guidanceScale = 7,
        string $modelId = null,
        string $negativePrompt = null,
        bool $photoReal = null,
        ?int $number = 4,
        int $weighting = null,
    ): Response {
        return Http::leonardoai()
            ->post('generations', [
                'prompt' => $prompt,
                'width' => $width,
                'height' => $height,
                'alchemy' => $alchemy,
                'guidance_scale' => $guidanceScale,
                'modelId' => $modelId,
                'negative_prompt' => $negativePrompt,
                'photoReal' => $photoReal,
                'num_images' => $number,
                'weighting' => $weighting,
                'public' => false,
            ]);
    }

    public static function getGeneration(string $id): Response
    {
        return Http::leonardoai()
            ->get('generations/'.$id);
    }
}
