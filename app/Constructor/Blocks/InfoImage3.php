<?php

namespace App\Constructor\Blocks;

use App\Support\Enums\DataType;
use Illuminate\Http\Request;

class InfoImage3 extends AbstractBlock
{
    protected static string $title = 'Info image3';

    protected static string $view = 'constructor.blocks.InfoImage3.view';

    protected static string $neuralText = 'constructor.blocks.InfoImage3.neural-text';

    protected static string $neuralImage = 'constructor.blocks.InfoImage3.neural-image';

    protected string $category = 'Info + Image';

    public function dataProperties(): array
    {
        return [
            'text' => [
                'value' => 'Creating a design for brands and involving people who interact with them is one of the main goals of our company',
                'type' => DataType::text,
                'label' => 'Text',
            ],
            'image' => [
                'value' => '',
                'type' => DataType::image,
                'label' => 'Image',
                'width' => 360,
                'height' => 560,
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
