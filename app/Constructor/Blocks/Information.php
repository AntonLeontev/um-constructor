<?php

namespace App\Constructor\Blocks;

use App\Support\Enums\DataType;
use Illuminate\Http\Request;

class Information extends AbstractBlock
{
    protected static string $title = 'Information';

    protected static string $view = 'constructor.blocks.Information.view';

    protected static string $neuralText = 'constructor.blocks.Information.neural-text';

    protected static string $neuralImage = 'constructor.blocks.Information.neural-image';

    public function dataProperties(): array
    {
        return [
            'text' => [
                'value' => 'Sample text',
                'type' => DataType::string,
                'label' => 'Text',
            ],
            'background_color' => [
                'value' => '',
                'type' => DataType::color,
                'label' => 'Background color',
                'css_property' => 'background-color',
            ],
            'font_color' => [
                'value' => '',
                'type' => DataType::color,
                'label' => 'Font color',
                'css_property' => 'color',
            ],
        ];
    }

    public function textGeneration(Request $request): array
    {
        $systemMessage = 'Don\'t use quotation marks in answer. Answer format must be in format: company name. Example: company name';

        $userMessage = "Write company name. The company is engaged: {$request->get('goal')}. ";

        return [$userMessage, $systemMessage];
    }

    public function imageGeneration(Request $request)
    {

    }
}
