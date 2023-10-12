<?php

namespace App\Providers;

use App\Contracts\HostingApiService;
use App\Services\Timeweb\TimewebService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        HostingApiService::class => TimewebService::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (app()->isLocal()) {
            Model::shouldBeStrict();
        }
    }
}
