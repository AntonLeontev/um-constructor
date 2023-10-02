<?php

namespace App\Constructor\Blocks\FirstScreens;

use App\Constructor\Blocks\AbstractBlock;
use Illuminate\Http\Request;

class FirstScreen extends AbstractBlock
{
    protected static string $title = 'First screen';

    protected static string $view = 'constructor.blocks.firstScreens.firstScreen';

    public function textGeneration(Request $request): array
    {
        return [];
    }
}
