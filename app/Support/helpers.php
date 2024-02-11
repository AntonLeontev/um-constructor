<?php

use App\Constructor\Blocks\AbstractBlock;
use App\Models\LeonardoModel;
use HaydenPierce\ClassFinder\ClassFinder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;

if (! function_exists('blocks_list')) {
    function blocks_list(): SupportCollection
    {
        ClassFinder::disablePSR4Vendors();

        $classes = ClassFinder::getClassesInNamespace('App\Constructor\Blocks', ClassFinder::RECURSIVE_MODE);

        $classes = array_diff($classes, ['App\Constructor\Blocks\AbstractBlock']);

        $blocks = collect();

        foreach ($classes as $class) {
            $block = app($class);

            if ($block->isArchived()) {
                continue;
            }

            $blocks->push($block);
        }

        return $blocks;
    }
}

if (! function_exists('blocks_by_categories')) {
    function blocks_by_categories(): SupportCollection
    {
        return blocks_list()
            ->mapToGroups(fn (AbstractBlock $item) => [$item->getCategory() => $item]);
    }
}

if (! function_exists('leo_models')) {
    function leo_models(): Collection
    {
        return LeonardoModel::get();
    }
}
