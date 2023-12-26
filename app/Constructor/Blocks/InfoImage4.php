<?php

namespace App\Constructor\Blocks;

use App\Support\Enums\DataType;
use Illuminate\Http\Request;

class InfoImage4 extends AbstractBlock
{
    protected static string $title = 'Info image4';

    protected static string $view = 'constructor.blocks.InfoImage4.view';

    protected static string $neuralText = 'constructor.blocks.InfoImage4.neural-text';

    protected static string $neuralImage = 'constructor.blocks.InfoImage4.neural-image';

    public function dataProperties(): array
    {
        return [
            'name' => [
                'value' => 'Lao Tzi',
                'type' => DataType::string,
                'label' => 'Name',
            ],
            'description' => [
                'value' => 'CEO',
                'type' => DataType::string,
                'label' => 'Description',
            ],
            'text' => [
                'value' => '"Creating a design for brands and involving people who interact with them is one of the main goals of our company"',
                'type' => DataType::text,
                'label' => 'Text',
            ],
            'image' => [
                'value' => '',
                'type' => DataType::image,
                'label' => 'Image',
                'width' => 180,
                'height' => 180,
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
