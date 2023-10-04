<?php

namespace App\Listeners;

use App\Events\SiteDeleting;
use Illuminate\Support\Facades\Storage;

class DeleteSiteFiles
{
    public function handle(SiteDeleting $event): void
    {
        Storage::disk('public')
            ->deleteDirectory("images/sites/{$event->site->id}");
    }
}
