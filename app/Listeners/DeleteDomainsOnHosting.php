<?php

namespace App\Listeners;

use App\Events\SiteDeleted;
use App\Jobs\DeleteDomainFromHosting;

class DeleteDomainsOnHosting
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
    public function handle(SiteDeleted $event): void
    {
        if (! app()->isProduction()) {
            return;
        }

        foreach ($event->site->domains as $domain) {
            dispatch(new DeleteDomainFromHosting($domain->title));
        }
    }
}
