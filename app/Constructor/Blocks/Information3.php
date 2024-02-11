<?php

namespace App\Constructor\Blocks;

use App\Support\Enums\DataType;
use Illuminate\Http\Request;

class Information3 extends AbstractBlock
{
    protected static string $title = 'Information3';

    protected static string $view = 'constructor.blocks.Information3.view';

    protected static string $neuralText = 'constructor.blocks.Information3.neural-text';

    protected static string $neuralImage = 'constructor.blocks.Information3.neural-image';

    protected string $category = 'Info';

    public function dataProperties(): array
    {
        return [
            'title' => [
                'value' => 'Achievements',
                'type' => DataType::string,
                'label' => 'Title',
            ],
            'description' => [
                'value' => 'Over the entire period of our company’s existence, we have completed a large number of projects, analyzed a huge amount of material and spent many hours solving problems. But all these efforts were worth it to do all the projects that we trusted',
                'type' => DataType::text,
                'label' => 'Description',
            ],
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
                'value' => 'completed projectss',
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
