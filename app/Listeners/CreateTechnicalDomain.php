<?php

namespace App\Listeners;

use App\Events\SiteCreated;
use App\Models\Domain;

class CreateTechnicalDomain
{
    public function handle(SiteCreated $event): void
    {
        $site = $event->site;

        if (app()->isProduction()) {
            $title = $site->user_id.time().'.'.config('server.domain');
        }

        if (app()->isLocal()) {
            $title = 'site.dnwb.loc';
        }

        Domain::create(['site_id' => $site->id, 'title' => $title]);
    }
}
