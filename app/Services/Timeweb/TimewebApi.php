<?php

namespace App\Services\Timeweb;

use Illuminate\Support\Facades\Http;

class TimewebApi
{
    public static function addSubdomain()
    {
        return Http::timeweb()
            ->post('api/v1/domains/{fqdn}/subdomains/{subdomain_fqdn}');
    }
}
