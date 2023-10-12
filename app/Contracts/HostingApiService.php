<?php

namespace App\Contracts;

interface HostingApiService
{
    public $api;

    public function addSubdomain(string $domain, string $subdomain): void;

    public function addDomain(string $domain): void;

    public function deleteSubdomain(string $domain, string $subdomain): void;

    public function deleteDomain(string $domain): void;
}
