<?php

namespace App\Constructor\Blocks;

use JsonSerializable;

abstract class AbstractBlock implements JsonSerializable
{
    protected static string $title;

    protected static string $view;

    protected static string $inputView;

    protected static string $preview = '/images/constructor/blocks/previews/default.png';

    public function getTitle(): string
    {
        return static::$title;
    }

    public function getPreview(): string
    {
        return static::$preview;
    }

    public function dataDefaults(): array
    {
        return [];
    }

    public function dataTypes(): array
    {
        return [];
    }

    public function dataLabels(): array
    {
        return [];
    }

    public function jsonSerialize(): mixed
    {
        return [
            'title' => static::getTitle(),
            'preview' => static::getPreview(),
            'class' => static::class,
        ];
    }

    public function inputView(array $data = []): string
    {
        return $this->render('constructor.input-view', $data);
    }

    public function view(array $data = []): string
    {
        return $this->render(static::$view, $data);
    }

    protected function render(string $view, array $data = []): string
    {
        $data = array_merge(static::dataDefaults(), $data);

        return view($view, [
            'data' => $data,
            'types' => static::dataTypes(),
            'labels' => static::dataLabels(),
        ])->render();
    }
}
