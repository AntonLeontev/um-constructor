<?php

namespace App\Listeners;

use App\Events\SiteDeleting;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\Storage;

class DeleteNginxConfigs
{
    public function handle(SiteDeleting $event): void
    {
        Storage::disk('nginx')->deleteDirectory($event->site->id);

        Process::run('/usr/bin/sudo -S /usr/sbin/nginx -s reload');
    }
}
