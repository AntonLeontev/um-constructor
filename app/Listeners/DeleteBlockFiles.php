<?php

namespace App\Listeners;

use App\Events\BlockDeleting;
use Illuminate\Support\Facades\Storage;

class DeleteBlockFiles
{
    public function handle(BlockDeleting $event): void
    {
        Storage::disk('public')
            ->deleteDirectory("images/sites/{$event->block->site_id}/blocks/{$event->block->id}");
    }
}
