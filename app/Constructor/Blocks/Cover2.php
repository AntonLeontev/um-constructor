<?php

namespace App\Constructor\Blocks;

use App\Support\Enums\DataType;
use Illuminate\Http\Request;

class Cover2 extends AbstractBlock
{
    protected static string $title = 'Cover 2';

    protected static string $view = 'constructor.blocks.Cover2.view';

    protected static string $neuralText = 'constructor.blocks.Cover2.neural-text';

    protected static string $neuralImage = 'constructor.blocks.Cover2.neural-image';

    public function dataProperties(): array
    {
        return [
            'title' => [
                'value' => 'We produce quality products',
                'type' => DataType::string,
                'label' => 'Phone Number',
            ],
            'text' => [
                'value' => 'Creating a design for brands and involving people who interact with them is one of the main goals of our company',
                'type' => DataType::text,
                'label' => 'Text',
            ],
            'image' => [
                'value' => '',
                'type' => DataType::image,
                'label' => 'Image',
                'width' => 780,
                'height' => 780,
            ],
        ];
    }

    /**
     * @return array [$userMessage, $systemMessage]
     */
    public function textGeneration(Request $request): array
    {
        return ['', ''];
    }

    public function imageGeneration(Request $request)
    {

    }
}
