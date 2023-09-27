<?php

namespace App\Constructor\Blocks\Headers;

use App\Constructor\Blocks\AbstractBlock;

class Header extends AbstractBlock
{
    protected static string $title = 'Header';

    protected static string $view = 'constructor.blocks.Header.view';

    protected static string $inputView = 'constructor.blocks.Header.input-view';

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
            'company' => 'text',
            'phone' => 'text',
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
