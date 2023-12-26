<?php

namespace App\Constructor\Blocks\Headers;

use App\Constructor\Blocks\AbstractBlock;
use App\Support\Enums\DataType;
use Illuminate\Http\Request;

class Header extends AbstractBlock
{
    protected static string $title = 'Header';

    protected static string $view = 'constructor.blocks.Header.view';

    protected static string $neuralText = 'constructor.blocks.Header.neural-text';

    protected static string $neuralImage = 'constructor.blocks.Header.neural-image';

    protected bool $archived = true;

    public function dataProperties(): array
    {
        return [
            'company' => [
                'value' => 'default company',
                'type' => DataType::string,
                'label' => 'Company',
            ],
            'phone' => [
                'value' => '000-00-00',
                'type' => DataType::string,
                'label' => 'Phone Number',
            ],
            'logo' => [
                'value' => '',
                'type' => DataType::image,
                'label' => 'Logo',
                'width' => '100',
                'height' => '100',
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
