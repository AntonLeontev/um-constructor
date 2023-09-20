<?php

namespace App\Services\NextLeg;

use App\Exceptions\Services\NextLeg\IncompleteMessageException;

class NextLegService
{
    public function __construct(public NextLegApi $api)
    {
    }

    public function imagine(
        string $prompt,
        int $chaos = null,
        int $stylize = null,
        int $weird = null,
        string $quality = null,
        string $no = null,
        string $aspect = null,
    ): string {
        if (! is_null($chaos)) {
            $prompt .= " --chaos $chaos";
        }

        if (! is_null($stylize)) {
            $prompt .= " --stylize $stylize";
        }

        if (! is_null($weird)) {
            $prompt .= " --weird $weird";
        }

        if (! is_null($quality)) {
            $prompt .= " --quality $quality";
        }

        if (! is_null($no)) {
            $prompt .= " --no $no";
        }

        if (! is_null($aspect)) {
            $prompt .= " --ar $aspect";
        }

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
            '↕️ Make Square',
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
