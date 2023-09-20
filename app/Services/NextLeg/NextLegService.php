<?php

namespace App\Services\NextLeg;

use App\Exceptions\Services\NextLeg\IncompleteMessageException;

class NextLegService
{
    public function __construct(public NextLegApi $api)
    {
    }

    public function imagine(string $prompt): string
    {
        $response = $this->api->imagine($prompt);

        return $response->json('messageId');
    }

    public function getMessage(string $messageId)
    {
        $response = $this->api->getMessage($messageId);

        if ($response->json('progress') === 'incomplete') {
            throw new IncompleteMessageException($messageId);
        }

        $json = $response->json();
        $buttons = data_get($json, 'response.buttons');

        if (! is_null($buttons)) {
            $json = $this->removeForbiddenButtons($json);
        }

        return $json;
    }

    public function button(
        string $buttonMessageId,
        string $button,
        string $zoom = '',
        string $ar = '',
    ) {
        $response = $this->api->buttons($buttonMessageId, $button, zoom: $zoom, ar: $ar);

        return $response->json('messageId');
    }

    private function removeForbiddenButtons(array $target): array
    {
        $forbiddenButtons = [
            'Web',
            '🖌️ Vary (Region)',
            '⬅️',
            '➡️',
            '⬆️',
            '⬇️',
        ];

        foreach ($forbiddenButtons as $button) {
            $key = array_search($button, data_get($target, 'response.buttons'));

            if ($key !== false) {
                data_forget($target, "response.buttons.{$key}");
            }
        }

        return $target;
    }
}
