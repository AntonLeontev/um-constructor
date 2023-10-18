<?php

namespace App\Constructor\Blocks\Footers;

use App\Constructor\Blocks\AbstractBlock;
use App\Support\Enums\DataType;
use Illuminate\Http\Request;

class Footer extends AbstractBlock
{
    protected static string $title = 'Footer';

    protected static string $view = 'constructor.blocks.Footer.view';

    protected static string $neuralText = 'constructor.blocks.Footer.neural-text';

    protected static string $neuralImage = 'constructor.blocks.Footer.neural-image';

    public function dataProperties(): array
    {
        return [
            'email' => [
                'value' => 'email',
                'type' => DataType::string,
                'label' => 'Email',
            ],
            'phone' => [
                'value' => '000-00-00',
                'type' => DataType::string,
                'label' => 'Phone Number',
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
