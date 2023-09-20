<?php

namespace App\Exceptions\Services\NextLeg;

use Exception;
use Illuminate\Http\Client\Response;

class NextLegException extends Exception
{
    public function __construct(Response $response)
    {
        $this->message = sprintf(
            '[%s] request to [%s] finished with status %s %s: %s',
            $response->transferStats->getRequest()->getMethod(),
            $response->transferStats->getRequest()->getUri(),
            $response->getStatusCode(),
            $response->getReasonPhrase(),
            $response->body(),
        );
    }
}
