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
        'max_tokens' => 10000,
        'gpt_model' => 'gpt-4', // [gpt-3.5-turbo, gpt-4, gpt-3.5-turbo-16k, gpt-4-32k]
    ],

];
