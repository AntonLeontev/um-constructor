<?php

namespace App\Jobs;

use App\Contracts\HostingApiService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DeleteDomainFromHosting implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public string $domain)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(HostingApiService $service): void
    {
        if (str($this->domain)->contains(config('server.domain'))) {
            $service->deleteSubdomain(config('server.domain'), $this->domain);

            return;
        }

        $service->deleteDomain($this->domain);
    }
}
