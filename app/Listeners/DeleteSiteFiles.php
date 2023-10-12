<?php

namespace App\Listeners;

use App\Events\SiteDeleted;
use Illuminate\Support\Facades\Storage;

class DeleteSiteFiles
{
    public function handle(SiteDeleted $event): void
    {
        Storage::disk('public')
            ->deleteDirectory("images/sites/{$event->site->id}");
    }
}
