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

    protected string $category = 'Footers';

    public function dataProperties(): array
    {
        return [
            'company' => [
                'value' => 'UMChain',
                'type' => DataType::string,
                'label' => 'Company',
            ],
            'instagram' => [
                'value' => '',
                'type' => DataType::string,
                'label' => 'Link on Instagram',
            ],
            'linkedin' => [
                'value' => '',
                'type' => DataType::string,
                'label' => 'Link on Linkedin',
            ],
            'facebook' => [
                'value' => '',
                'type' => DataType::string,
                'label' => 'Link on Facebook',
            ],
            'youtube' => [
                'value' => '',
                'type' => DataType::string,
                'label' => 'Link on Youtube',
            ],
            'tiktok' => [
                'value' => '',
                'type' => DataType::string,
                'label' => 'Link on Tiktok',
            ],
            'x' => [
                'value' => '',
                'type' => DataType::string,
                'label' => 'Link on X',
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
