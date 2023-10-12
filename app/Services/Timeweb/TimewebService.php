<?php

namespace App\Services\Timeweb;

use App\Contracts\HostingApiService;

class TimewebService implements HostingApiService
{
    public function __construct(public TimewebApi $api)
    {
    }

    public function addSubdomain(string $domain, string $subdomain): void
    {
        $sub = $this->removeDomain($domain, $subdomain);

        $this->api->addSubdomain($domain, $sub);

        $this->api->addDnsRecords($subdomain, 'A', config('server.ip'));
    }

    public function addDomain(string $domain): void
    {
        $this->api->addDomain($domain);

        $this->api->addDnsRecords($domain, 'A', config('server.ip'));
    }

    public function deleteSubdomain(string $domain, string $subdomain): void
    {
        $sub = $this->removeDomain($domain, $subdomain);

        $this->api->deleteSubdomain($domain, $sub);
    }

    public function deleteDomain(string $domain): void
    {
        $this->api->deleteDomain($domain);
    }

    private function removeDomain(string $domain, string $subdomain): string
    {
        return str($subdomain)->remove($domain)->trim('.')->value();
    }
}
