<?php

namespace App\Listeners;

use App\Events\DomainCreated;

class CreateDomainOnHosting
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
    public function handle(DomainCreated $event): void
    {
        //
    }
}
