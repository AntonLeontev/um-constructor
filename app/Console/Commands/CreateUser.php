<?php

namespace App\Console\Commands;

use App\Mail\AccessToSite;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CreateUser extends Command implements PromptsForMissingInput
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-user {email} {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates new user and sends email with password';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::where('email', $this->argument('email'))->get();

        if ($user->isNotEmpty()) {
            $this->error('Уже есть пользователь с этой почтой');

            return Command::FAILURE;
        }

        $password = Str::random(10);

        $user = User::create([
            'name' => $this->argument('name'),
            'email' => $this->argument('email'),
            'password' => bcrypt($password),
        ]);

        Mail::to($user->email)->send(new AccessToSite($user, $password));

        $this->info('Success');

        return Command::SUCCESS;
    }

    protected function promptForMissingArgumentsUsing()
    {
        return [
            'email' => 'Enter email',
            'name' => 'Enter name',
        ];
    }
}
