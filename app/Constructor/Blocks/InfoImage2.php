<?php

namespace App\Constructor\Blocks;

use App\Support\Enums\DataType;
use Illuminate\Http\Request;

class InfoImage2 extends AbstractBlock
{
    protected static string $title = 'Info image2';

    protected static string $view = 'constructor.blocks.InfoImage2.view';

    protected static string $neuralText = 'constructor.blocks.InfoImage2.neural-text';

    protected static string $neuralImage = 'constructor.blocks.InfoImage2.neural-image';

    protected string $category = 'Info + Image';

    public function dataProperties(): array
    {
        return [
            'title' => [
                'value' => 'Main text',
                'type' => DataType::string,
                'label' => 'Main text',
            ],
            'text' => [
                'value' => 'Creating a design for brands and involving people who interact with them is one of the main goals of our company',
                'type' => DataType::text,
                'label' => 'First text',
            ],
            'number1' => [
                'value' => '120 000',
                'type' => DataType::string,
                'label' => 'Second title',
            ],
            'text1' => [
                'value' => 'Creating a design',
                'type' => DataType::string,
                'label' => 'Second text',
            ],
            'number2' => [
                'value' => '120 000',
                'type' => DataType::string,
                'label' => 'Second title',
            ],
            'text2' => [
                'value' => 'Creating a design',
                'type' => DataType::string,
                'label' => 'Second text',
            ],
            'number3' => [
                'value' => '120 000',
                'type' => DataType::string,
                'label' => 'Second title',
            ],
            'text3' => [
                'value' => 'Creating a design',
                'type' => DataType::string,
                'label' => 'Second text',
            ],
            'image' => [
                'value' => '',
                'type' => DataType::image,
                'label' => 'Image',
                'width' => 570,
                'height' => 400,
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
