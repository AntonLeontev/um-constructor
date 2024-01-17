<?php

namespace App\Console\Commands;

use App\Models\LeonardoModel;
use App\Services\LeonardoAI\LeonardoApi;
use Illuminate\Console\Command;

class UpdateLeonardoModels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:leo-models';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $models = LeonardoApi::platformModels()->json('custom_models');

        foreach ($models as $model) {
            LeonardoModel::updateOrCreate(
                ['uuid' => $model['id']],
                [
                    'name' => $model['name'],
                    'description' => $model['description'],
                    'nsfw' => $model['nsfw'],
                    'featured' => $model['featured'],
                    'generated_image' => $model['generated_image'],
                ]
            );
        }

        LeonardoModel::where('updated_at', '<', today()->subDay())->delete();
    }
}
