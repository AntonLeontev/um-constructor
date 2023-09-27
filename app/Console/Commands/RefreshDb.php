<?php

namespace App\Console\Commands;

use App\Models\Site;
use App\Models\User;
use Illuminate\Console\Command;

class RefreshDb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:refresh';

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
        $this->call('migrate:fresh');

        $user = User::create(['name' => 'Anton', 'email' => 'aner-anton@yandex.ru', 'password' => bcrypt('12345678')]);
        Site::create(['title' => 'First', 'user_id' => $user->id]);
    }
}
