<?php

namespace App\Listeners;

use App\Events\DomainDeleted;
use App\Services\Process\ProcessService;
use Illuminate\Support\Facades\Storage;

class DeleteDomainNginxConfig
{
    public function handle(DomainDeleted $event): void
    {
        Storage::disk('nginx')->delete("{$event->domain->site_id}/{$event->domain->title}");

        ProcessService::reloadNginx();
    }
}
