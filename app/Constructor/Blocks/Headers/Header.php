<?php

namespace App\Constructor\Blocks\Headers;

use App\Constructor\Blocks\AbstractBlock;
use App\Support\Enums\DataType;

class Header extends AbstractBlock
{
    protected static string $title = 'Header';

    protected static string $view = 'constructor.blocks.Header.view';

    protected static string $neuralText = 'constructor.blocks.Header.neural-text';

    protected static string $neuralImage = 'constructor.blocks.Header.neural-image';

    public function dataDefaults(): array
    {
        return [
            'company' => __('default value'),
            'phone' => '000-00-00',
        ];
    }

    public function dataTypes(): array
    {
        return [
            'company' => DataType::string,
            'phone' => DataType::string,
        ];
    }

    public function dataLabels(): array
    {
        return [
            'company' => 'Company',
            'phone' => 'Phone Number',
        ];
    }
}
