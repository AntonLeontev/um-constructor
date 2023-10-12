<?php

namespace App\Listeners;

use App\Events\DomainCreated;
use App\Services\Process\ProcessService;
use Illuminate\Support\Facades\Storage;

class CreateWebServerConfig
{
    public function handle(DomainCreated $event): void
    {
        $domain = $event->domain;

        $content = view('file_templates.nginx_config', compact('domain'));

        Storage::disk('nginx')->put("{$domain->site_id}/{$domain->title}", $content);

        ProcessService::reloadNginx();
    }
}
