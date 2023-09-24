<?php

namespace App\Constructor\Blocks\Headers;

class Header
{
    protected static string $title = 'Header';

    protected static string $view = 'blocks.headers.header';

    public static function getTitle(): string
    {
        return self::$title;
    }
}
