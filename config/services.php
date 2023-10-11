<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'openAI' => [
        'token' => env('OPENAI_TOKEN', ''),
    ],

    // Midjourney access
    'nextLeg' => [
        'authToken' => env('NEXT_LEG_TOKEN'),
    ],

    'telegram' => [
        'bot' => env('TELEGRAM_TOKEN'),
    ],

    'timeweb' => [
        'token' => env('TIMEWEB_TOKEN'),
    ],

];
