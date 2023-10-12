<?php

namespace App\Listeners;

use App\Events\DomainCreated;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\Storage;

class CreateWebServerConfig
{
    public function handle(DomainCreated $event): void
    {
        $domain = $event->domain;

        $content = view('file_templates.nginx_config', compact('domain'));

        Storage::disk('nginx')->put("{$domain->site_id}/{$domain->title}", $content);

        Process::run('/usr/bin/sudo -S nginx -s reload');
    }
}
