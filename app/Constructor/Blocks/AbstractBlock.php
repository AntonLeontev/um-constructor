<?php

namespace App\Constructor\Blocks;

use JsonSerializable;

abstract class AbstractBlock implements JsonSerializable
{
    protected static string $title;

    protected static string $view;

    protected static string $preview;

    protected static string $neuralText;

    protected static string $neuralImage;

    protected static string $image = '/images/constructor/blocks/previews/default.png';

    public function getTitle(): string
    {
        return static::$title;
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
            'title' => static::$title,
            'image' => static::$image,
            'class' => static::class,
        ];
    }

    public function inputView(array $data = []): string
    {
        return $this->render('constructor.input-view', $data);
    }

    public function preview(array $data = []): string
    {
        $view = static::$preview ?? static::$view;

        return $this->render($view, $data);
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
