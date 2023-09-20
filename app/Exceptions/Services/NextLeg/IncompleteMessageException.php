<?php

namespace App\Exceptions\Services\NextLeg;

class IncompleteMessageException extends NextLegException
{
    public function __construct(public readonly string $messageId)
    {
    }
}
