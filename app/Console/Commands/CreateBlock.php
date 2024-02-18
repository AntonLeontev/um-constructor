<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;
use Illuminate\Support\Str;

class CreateBlock extends Command implements PromptsForMissingInput
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:block {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates new block and files for it';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = Str::of($this->argument('name'))->studly()->value();

        $classDir = app_path('Constructor/Blocks');

        $classContent = file_get_contents(resource_path('stubs/block.stub'));

        $classContent = Str::of($classContent)->swap([
            ':className' => $name,
            ':title' => Str::of($name)->snake()->replace('_', ' ')->ucfirst()->value(),
        ]);

        if (! is_dir($classDir)) {
            mkdir($classDir);
        }

        file_put_contents("$classDir/$name.php", $classContent);

        $dir = resource_path("views/constructor/blocks/$name");

        if (! is_dir($dir)) {
            mkdir($dir);
            file_put_contents($dir.'/view.blade.php', '');
        } else {
            $this->error('Папка для этого блока уже существует!');
        }

    }
}
