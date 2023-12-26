<?php

use HaydenPierce\ClassFinder\ClassFinder;

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
