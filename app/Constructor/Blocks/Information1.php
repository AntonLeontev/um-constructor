<?php

namespace App\Constructor\Blocks;

use App\Support\Enums\DataType;
use Illuminate\Http\Request;

class Information1 extends AbstractBlock
{
    protected static string $title = 'Information1';

    protected static string $view = 'constructor.blocks.Information1.view';

    protected static string $neuralText = 'constructor.blocks.Information1.neural-text';

    protected static string $neuralImage = 'constructor.blocks.Information1.neural-image';

    public function dataProperties(): array
    {
        return [
            'title' => [
                'value' => 'Title',
                'type' => DataType::string,
                'label' => 'Description',
            ],
            'text1' => [
                'value' => 'Creating a design for brands and involving people who interact with them is one of the main goals of our company',
                'type' => DataType::text,
                'label' => 'Text 1',
            ],
            'text2' => [
                'value' => 'Creating a design for brands and involving people who interact with them is one of the main goals of our company',
                'type' => DataType::text,
                'label' => 'Text 2',
            ],
            'text3' => [
                'value' => 'Creating a design for brands and involving people who interact with them is one of the main goals of our company',
                'type' => DataType::text,
                'label' => 'Text 3',
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
