<?php

namespace App\Listeners;

use App\Contracts\HostingApiService;
use App\Events\DomainCreating;

class CreateDomainOnHosting
{
    /**
     * Create the event listener.
     */
    public function __construct(public HostingApiService $service)
    {
    }

    /**
     * Handle the event.
     */
    public function handle(DomainCreating $event): void
    {
        if (! app()->isProduction()) {
            return;
        }

        if (str($event->domain->title)->contains(config('server.domain'))) {
            $this->service->addSubdomain(config('server.domain'), $event->domain->title);

            return;
        }

        $this->service->addDomain($event->domain->title);
    }
}
