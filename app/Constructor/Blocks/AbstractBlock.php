<?php

namespace App\Constructor\Blocks;

use JsonSerializable;

abstract class AbstractBlock implements JsonSerializable
{
    protected static string $title;

    protected static string $view;

    protected static string $preview = '/images/constructor/blocks/previews/default.png';

    protected array $data = [];

    public function getTitle(): string
    {
        return static::$title;
    }

    public function getPreview(): string
    {
        return static::$preview;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'title' => static::getTitle(),
            'preview' => static::getPreview(),
            'class' => static::class,
        ];
    }
}
