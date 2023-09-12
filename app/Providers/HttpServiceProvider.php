<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class HttpServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        Http::macro('openai', function () {
            return Http::withHeaders(['Authorization' => 'Bearer '.config('services.openAI.token')])
                ->timeout(60)
                ->asJson()
                ->acceptJson()
                ->baseUrl('https://api.openai.com/v1');
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
