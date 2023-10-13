<?php

namespace App\Listeners;

use App\Events\SiteCreated;
use App\Models\SiteGeneral;

class CreateSiteGeneral
{
    public function handle(SiteCreated $event): void
    {
        SiteGeneral::create(['site_id' => $event->site->id]);
    }
}
