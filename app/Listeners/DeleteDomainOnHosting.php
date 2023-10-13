<?php

namespace App\Listeners;

use App\Events\DomainDeleted;
use App\Jobs\DeleteDomainFromHosting;

class DeleteDomainOnHosting
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
    public function handle(DomainDeleted $event): void
    {
        if (! app()->isProduction()) {
            return;
        }

        dispatch(new DeleteDomainFromHosting($event->domain->title));
    }
}
