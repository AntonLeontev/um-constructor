<?php

namespace App\Constructor\Blocks\Footers;

use App\Constructor\Blocks\AbstractBlock;
use Illuminate\Http\Request;

class Footer extends AbstractBlock
{
    protected static string $title = 'Footer';

    protected static string $view = 'constructor.blocks.footers.footer';

    public function textGeneration(Request $request): array
    {
        return [];
    }
}
