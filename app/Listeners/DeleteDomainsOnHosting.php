<?php

namespace App\Listeners;

use App\Events\SiteDeleting;
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
    public function handle(SiteDeleting $event): void
    {
        if (! app()->isProduction()) {
            return;
        }

        foreach ($event->site->domains as $domain) {
            dispatch(new DeleteDomainFromHosting($domain->title));
        }
    }
}
