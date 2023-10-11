<?php

namespace App\Exceptions\Services\Timeweb;

use Exception;
use Illuminate\Http\Client\Response;

class TimewebException extends Exception
{
    public function __construct(Response $response)
    {
        $this->message = sprintf(
            '[%s] request to [%s] finished with status %s %s: %s. Response id: %s',
            $response->transferStats->getRequest()->getMethod(),
            $response->transferStats->getRequest()->getUri(),
            $response->getStatusCode(),
            $response->getReasonPhrase(),
            $response->json('message'),
            $response->json('response_id'),
        );
    }
}
