<?php

namespace App\Listeners;

use App\Events\BlockCreating;
use App\Models\Block;

class DefinePosition
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(BlockCreating $event): void
    {
        $block = $event->block;

        if (! empty($block->position)) {
            return;
        }

        $maxPosition = Block::where('site_id', $block->site_id)
            ->orderByDesc('position')
            ->max('position');

        if (empty($maxPosition)) {
            $block->position = 1;

            return;
        }

        $block->position = ++$maxPosition;
    }
}
