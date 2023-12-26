<?php

namespace App\Constructor\Blocks;

use App\Support\Enums\DataType;
use Illuminate\Http\Request;

class Information2 extends AbstractBlock
{
    protected static string $title = 'Information2';

    protected static string $view = 'constructor.blocks.Information2.view';

    protected static string $neuralText = 'constructor.blocks.Information2.neural-text';

    protected static string $neuralImage = 'constructor.blocks.Information2.neural-image';

    public function dataProperties(): array
    {
        return [
            'title' => [
                'value' => 'First step',
                'type' => DataType::string,
                'label' => 'Title',
            ],
            'small_text' => [
                'value' => 'Creating a design for brands and involving people who interact with them is one of the main goals of our company',
                'type' => DataType::text,
                'label' => 'Small text',
            ],
            'big_text' => [
                'value' => 'We use proven design methods to create a personal approach to each product. This allows you to achieve high results and the quality of the work done',
                'type' => DataType::text,
                'label' => 'Big text',
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
