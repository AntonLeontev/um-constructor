<?php

namespace App\Constructor\Blocks;

use App\Support\Enums\DataType;
use Illuminate\Http\Request;

class HeaderWithImageLogo extends AbstractBlock
{
    protected static string $title = 'Header with image logo';

    protected static string $view = 'constructor.blocks.HeaderWithImageLogo.view';

    protected static string $neuralText = 'constructor.blocks.HeaderWithImageLogo.neural-text';

    protected static string $neuralImage = 'constructor.blocks.HeaderWithImageLogo.neural-image';

    protected string $category = 'Headers';

    public function dataProperties(): array
    {
        return [
            'phone' => [
                'value' => '000-00-00',
                'type' => DataType::string,
                'label' => 'Phone Number',
            ],
            'image' => [
                'value' => '',
                'type' => DataType::image,
                'label' => 'Logo',
                'width' => '160',
                'height' => '100',
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
