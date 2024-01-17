<?php

namespace App\Services\LeonardoAI;

class LeonardoService
{
    public function __construct(public LeonardoApi $api)
    {
    }

    public function imagine(
        string $prompt,
        int $width,
        int $height,
        string $no = null,
        ?string $modelId
    ): string {
        $minDimension = min($height, $width);
        if ($minDimension < 512) {
            $coef = 512 / $minDimension;
            $height = $height * $coef;
            $width = $width * $coef;
        }

        if ($width % 8 !== 0) {
            $width = 8 * ceil($width / 8);
        }

        if ($height % 8 !== 0) {
            $height = 8 * ceil($height / 8);
        }

        return $this->api
            ->imagine(
                $prompt,
                $width,
                $height,
                negativePrompt: $no,
                modelId: $modelId,
            )
            ->json('sdGenerationJob.generationId');
    }

    public function getGeneration(string $id)
    {
        return $this->api->getGeneration($id)->json();
    }
}
