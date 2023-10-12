<?php

namespace App\Listeners;

use App\Events\SiteDeleting;
use App\Services\Process\ProcessService;
use Illuminate\Support\Facades\Storage;

class DeleteNginxConfigs
{
    public function handle(SiteDeleting $event): void
    {
        Storage::disk('nginx')->deleteDirectory($event->site->id);

        ProcessService::reloadNginx();
    }
}
