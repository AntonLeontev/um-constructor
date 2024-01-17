<?php

use App\Models\LeonardoModel;
use HaydenPierce\ClassFinder\ClassFinder;
use Illuminate\Database\Eloquent\Collection;

if (! function_exists('blocks_list')) {
    function blocks_list(): array
    {
        ClassFinder::disablePSR4Vendors();

        $classes = ClassFinder::getClassesInNamespace('App\Constructor\Blocks', ClassFinder::RECURSIVE_MODE);

        $classes = array_diff($classes, ['App\Constructor\Blocks\AbstractBlock']);

        $blocks = [];

        foreach ($classes as $class) {
            $block = app($class);

            if ($block->isArchived()) {
                continue;
            }

            $blocks[] = $block;
        }

        return $blocks;
    }
}

if (! function_exists('leo_models')) {
    function leo_models(): Collection
    {
        return LeonardoModel::get();
    }
}
