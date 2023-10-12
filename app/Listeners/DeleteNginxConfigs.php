<?php

namespace App\Listeners;

use App\Events\SiteDeleted;
use App\Services\Process\ProcessService;
use Illuminate\Support\Facades\Storage;

class DeleteNginxConfigs
{
    public function handle(SiteDeleted $event): void
    {
        Storage::disk('nginx')->deleteDirectory($event->site->id);

        ProcessService::reloadNginx();
    }
}
