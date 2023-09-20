<?php

namespace App\Services\NextLeg;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class NextLegApi
{
    public static function imagine(
        string $prompt,
        string $ref = '',
        string $webhookOverride = '',
        bool $ignorePrefilter = false,
    ): Response {
        return Http::midjourney()
            ->post('/imagine', [
                'msg' => $prompt,
                'ref' => $ref,
                'webhookOverride' => $webhookOverride,
                'ignorePrefilter' => $ignorePrefilter,
            ]);
    }

    public static function getMessage(
        string $messageId,
        int $expireMins = 12,
    ): Response {
        return Http::midjourney()
            ->get("/message/{$messageId}?expireMins={$expireMins}");
    }

    public static function buttons(
        string $buttonMessageId,
        string $button,
        string $ref = '',
        string $webhookOverride = '',
        string $zoom = '',
        string $ar = '',
    ): Response {
        return Http::midjourney()
            ->post('/button', [
                'buttonMessageId' => $buttonMessageId,
                'button' => $button,
                'ref' => $ref,
                'webhookOverride' => $webhookOverride,
                'zoom' => $zoom,
                'ar' => $ar,
            ]);
    }
}
