<?php

namespace App\Constructor\Blocks;

use App\Support\Enums\DataType;
use Illuminate\Http\Request;

class InfoImage1 extends AbstractBlock
{
    protected static string $title = 'Info image1';

    protected static string $view = 'constructor.blocks.InfoImage1.view';

    protected static string $neuralText = 'constructor.blocks.InfoImage1.neural-text';

    protected static string $neuralImage = 'constructor.blocks.InfoImage1.neural-image';

    public function dataProperties(): array
    {
        return [
            'main_text' => [
                'value' => 'Main text',
                'type' => DataType::string,
                'label' => 'Main text',
            ],
            'title1' => [
                'value' => 'First title',
                'type' => DataType::string,
                'label' => 'First title',
            ],
            'text1' => [
                'value' => 'Creating a design for brands and involving people who interact with them is one of the main goals of our company',
                'type' => DataType::text,
                'label' => 'First text',
            ],
            'title2' => [
                'value' => 'We produce quality products',
                'type' => DataType::string,
                'label' => 'Second title',
            ],
            'text2' => [
                'value' => 'Creating a design for brands and involving people who interact with them is one of the main goals of our company',
                'type' => DataType::text,
                'label' => 'Second text',
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
