<?php

namespace App\Constructor\Blocks;

use App\Support\Enums\DataType;
use Illuminate\Http\Request;

class Information4 extends AbstractBlock
{
    protected static string $title = 'Information4';

    protected static string $view = 'constructor.blocks.Information4.view';

    protected static string $neuralText = 'constructor.blocks.Information4.neural-text';

    protected static string $neuralImage = 'constructor.blocks.Information4.neural-image';

    public function dataProperties(): array
    {
        return [
            'number1' => [
                'value' => '120 000',
                'type' => DataType::string,
                'label' => 'Second title',
            ],
            'text1' => [
                'value' => 'Creating a design',
                'type' => DataType::string,
                'label' => 'hours of analytics',
            ],
            'number2' => [
                'value' => '10 000',
                'type' => DataType::string,
                'label' => 'Second title',
            ],
            'text2' => [
                'value' => 'prototypes',
                'type' => DataType::string,
                'label' => 'Second text',
            ],
            'number3' => [
                'value' => '132',
                'type' => DataType::string,
                'label' => 'Second title',
            ],
            'text3' => [
                'value' => 'completed projects',
                'type' => DataType::string,
                'label' => 'Second text',
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
