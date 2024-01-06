<?php

namespace App\Providers;

use App\Exceptions\Services\NextLeg\NextLegException;
use App\Exceptions\Services\OpenAI\OpenAIException;
use App\Exceptions\Services\Timeweb\TimewebException;
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
                ->baseUrl('https://api.openai.com/v1')
                ->throw(function (Response $response) {
                    throw new OpenAIException($response);
                });
        });

        Http::macro('discord', function () {
            return Http::baseUrl('https://discord.com/api/v9/');
        });

        Http::macro('midjourney', function () {
            return Http::baseUrl('https://api.thenextleg.io/v2')
                ->asJson()
                ->withHeaders(['Authorization' => 'Bearer '.config('services.nextLeg.authToken')])
                ->throw(function (Response $response) {
                    if ($response->status() === 400 && $response->json('isNaughty')) {
                        throw ValidationException::withMessages($response->json());
                    }

                    throw new NextLegException($response);
                });
        });

        Http::macro('timeweb', function () {
            return Http::baseUrl('https://api.timeweb.cloud')
                ->asJson()
                ->withHeader('Authorization', 'Bearer '.config('services.timeweb.token'))
                ->retry(3, 100)
                ->throw(function (Response $response) {
                    if (
                        $response->getStatusCode() === 409
                        && str($response->transferStats->getRequest()->getUri())->contains('add-domain')
                        && $response->json('message') === 'Entity already exists'
                    ) {
                        throw ValidationException::withMessages(['This domain is already taken']);
                    }

                    throw new TimewebException($response, 1);
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
