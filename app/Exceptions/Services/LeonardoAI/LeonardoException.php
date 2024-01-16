<?php

namespace App\Exceptions\Services\LeonardoAI;

use Exception;
use Illuminate\Http\Client\Response;

class LeonardoException extends Exception
{
    public string $publicMessage;

    public function __construct(Response $response)
    {
        $this->message = sprintf(
            '[%s] request to [%s] finished with status %s %s: %s',
            $response->transferStats->getRequest()->getMethod(),
            $response->transferStats->getRequest()->getUri(),
            $response->getStatusCode(),
            $response->getReasonPhrase(),
            $response->json('error'),
        );

        $this->publicMessage = $response->json('error');
    }
}
