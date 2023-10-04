<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateBlock extends Command
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
        $dir = resource_path("views/constructor/blocks/{$this->argument('name')}");

        if (! is_dir($dir)) {
            mkdir($dir);
            file_put_contents($dir.'/neural-image.blade.php', '');
            file_put_contents($dir.'/neural-text.blade.php', '');
            file_put_contents($dir.'/view.blade.php', '');
        } else {
            $this->error('Папка для этого блока уже существует!');
        }

    }
}
