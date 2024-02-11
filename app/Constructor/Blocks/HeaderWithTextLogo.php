<?php

namespace App\Constructor\Blocks;

use App\Support\Enums\DataType;
use Illuminate\Http\Request;

class HeaderWithTextLogo extends AbstractBlock
{
    protected static string $title = 'Header with text logo';

    protected static string $view = 'constructor.blocks.HeaderWithTextLogo.view';

    protected static string $neuralText = 'constructor.blocks.HeaderWithTextLogo.neural-text';

    protected static string $neuralImage = 'constructor.blocks.HeaderWithTextLogo.neural-image';

    protected string $category = 'Headers';

    public function dataProperties(): array
    {
        return [
            'phone' => [
                'value' => '000-00-00',
                'type' => DataType::string,
                'label' => 'Phone Number',
            ],
            'logo' => [
                'value' => 'Company Name',
                'type' => DataType::string,
                'label' => 'Company',
            ],
            'instagram' => [
                'value' => '#',
                'type' => DataType::string,
                'label' => 'Link on Instagram',
            ],
            'linkedin' => [
                'value' => '#',
                'type' => DataType::string,
                'label' => 'Link on Linkedin',
            ],
            'facebook' => [
                'value' => '#',
                'type' => DataType::string,
                'label' => 'Link on Facebook',
            ],
            'youtube' => [
                'value' => '#',
                'type' => DataType::string,
                'label' => 'Link on Youtube',
            ],
            'tiktok' => [
                'value' => '#',
                'type' => DataType::string,
                'label' => 'Link on Tiktok',
            ],
            'x' => [
                'value' => '#',
                'type' => DataType::string,
                'label' => 'Link on X',
            ],
            'background_color' => [
                'value' => '',
                'type' => DataType::color,
                'label' => 'Background color',
                'css_property' => 'background-color',
            ],
        ];
    }

    /**
     * @return array [$userMessage, $systemMessage]
     */
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
