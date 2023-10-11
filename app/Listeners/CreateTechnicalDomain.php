<?php

namespace App\Listeners;

use App\Events\SiteCreated;
use App\Models\Domain;

class CreateTechnicalDomain
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SiteCreated $event): void
    {
        $site = $event->site;

        //TODO change
        // $title = $site->user_id . time() . '.' . config('app.domain');
        $title = '11697040354.dnwb.loc';

        Domain::create(['site_id' => $site->id, 'title' => $title]);
    }
}
