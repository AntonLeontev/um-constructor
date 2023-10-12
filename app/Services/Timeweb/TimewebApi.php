<?php

namespace App\Services\Timeweb;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class TimewebApi
{
    public static function addSubdomain(string $domain, string $subdomain): Response
    {
        return Http::timeweb()
            ->post("api/v1/domains/$domain/subdomains/$subdomain");
    }

    public static function addDomain(string $domain): Response
    {
        return Http::timeweb()
            ->post("api/v1/add-domain/$domain");
    }

    public static function deleteSubdomain(string $domain, string $subdomain): Response
    {
        return Http::timeweb()
            ->delete("api/v1/domains/$domain/subdomains/$subdomain");
    }

    public static function deleteDomain(string $domain): Response
    {
        return Http::timeweb()
            ->delete("api/v1/domains/$domain");
    }

    public static function getDomains(): Response
    {
        return Http::timeweb()
            ->get('api/v1/domains');
    }

    public static function addDnsRecords(string $domain, string $type, string $value): Response
    {
        return Http::timeweb()
            ->post("api/v1/domains/$domain/dns-records", [
                'type' => $type,
                'value' => $value,
            ]);
    }
}
