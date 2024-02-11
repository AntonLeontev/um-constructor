<?php

namespace App\Constructor\Blocks;

use Illuminate\Http\Request;
use JsonSerializable;

abstract class AbstractBlock implements JsonSerializable
{
    protected static string $title;

    protected static string $view;

    protected static string $preview;

    protected static string $neuralText;

    protected static string $neuralImage;

    protected static string $image = '/images/constructor/blocks/previews/default.png';

    protected bool $archived = false;

    protected string $category = 'Other';

    abstract public function textGeneration(Request $request): array;

    public function getTitle(): string
    {
        return static::$title;
    }

    public function dataProperties(): array
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

    public function neuralText(array $data = []): string
    {
        return $this->render(static::$neuralText, $data);
    }

    public function neuralImage(array $data = []): string
    {
        return $this->render(static::$neuralImage, $data);
    }

    public function isArchived(): bool
    {
        return $this->archived;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    protected function render(string $view, array $data = []): string
    {
        $props = static::dataProperties();

        foreach ($props as $name => $properties) {
            if (empty($data[$name])) {
                continue;
            }

            $props[$name]['value'] = $data[$name];
        }

        return view($view, [
            'data' => $props,
        ])->render();
    }
}
