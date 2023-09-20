<?php

namespace App\Providers;

use App\Exceptions\Services\NextLeg\NextLegException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\ValidationException;

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

        Http::macro('discord', function () {
            return Http::baseUrl('https://discord.com/api/v9/');
        });

        Http::macro('midjourney', function () {
            return Http::baseUrl('https://api.thenextleg.io/v2')
                ->asJson()
                ->withHeaders(['Authorization' => 'Bearer '.config('services.nextLeg.authToken')])
                ->throw(function (Response $response) {
                    if ($response->status() === 400 && $response->json('isNaughty') === true) {
                        throw ValidationException::withMessages($response->json());
                    }

                    throw new NextLegException($response);
                });
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
