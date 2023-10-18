<?php

namespace App\Constructor\Blocks\FirstScreens;

use App\Constructor\Blocks\AbstractBlock;
use App\Support\Enums\DataType;
use Illuminate\Http\Request;

class FirstScreenRight extends AbstractBlock
{
    protected static string $title = 'First screen with right image';

    protected static string $view = 'constructor.blocks.FirstScreenRight.view';

    protected static string $neuralText = 'constructor.blocks.FirstScreenRight.neural-text';

    protected static string $neuralImage = 'constructor.blocks.FirstScreenRight.neural-image';

    public function dataProperties(): array
    {
        return [
            'title' => [
                'value' => 'Title',
                'type' => DataType::string,
                'label' => 'Title',
            ],
            'subtitle' => [
                'value' => 'Subtitle',
                'type' => DataType::string,
                'label' => 'Subtitle',
            ],
            'image' => [
                'value' => '',
                'type' => DataType::image,
                'label' => 'Image',
                'width' => '400',
                'height' => '600',
            ],
            'background_color' => [
                'value' => '',
                'type' => DataType::color,
                'label' => 'Background color',
                'css_property' => 'background-color',
            ],
            'font_color' => [
                'value' => '',
                'type' => DataType::color,
                'label' => 'Font color',
                'css_property' => 'color',
            ],
        ];
    }

    public function textGeneration(Request $request): array
    {
        $systemMessage = 'Answer format must be in JSON format: {"title": "title", "subtitle": "subtitle"}. Example: { "title": "Get Your Home Sparkling Clean!", "subtitle": "Leave the cleaning to our professionals and enjoy a house that gleams from top to bottom." }';

        $userMessage = "Write one variant of title - subtitle for landing page. The website goal is {$request->get('goal')}. ";

        if (! is_null($request->ta)) {
            $userMessage .= "Landing page target audience: {$request->ta}. ";
        }
        if (! is_null($request->benefit)) {
            $userMessage .= "Description of the main offer or advantage: {$request->benefit}. ";
        }
        if (! is_null($request->message)) {
            $userMessage .= "The general message that needs to be conveyed to visitors: {$request->message}. ";
        }
        if (! is_null($request->keywords)) {
            $userMessage .= "Use the following keywords or phrases: {$request->keywords}. ";
        }
        if (! is_null($request->additionally)) {
            $userMessage .= "Additional requirements: {$request->additionally}. ";
        }

        return [$userMessage, $systemMessage];
    }

    public function imageGeneration(Request $request)
    {

    }
}
