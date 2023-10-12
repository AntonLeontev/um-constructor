<?php

namespace App\Listeners;

use App\Contracts\HostingApiService;
use App\Events\DomainCreated;

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
    public function handle(DomainCreated $event): void
    {
        if (! app()->isProduction()) {
            return;
        }

        if (str($event->domain)->contains(config('server.domain'))) {
            $this->service->addSubdomain(config('server.domain'), $event->domain);

            return;
        }

        $this->service->addDomain($event->domain);
    }
}
