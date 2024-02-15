<?php

namespace App\Console\Commands\Users;

use App\Models\User;
use Illuminate\Console\Command;

class CreateUserCommand extends Command
{
    protected $signature = 'users:create';

    public function handle()
    {
        $this->warn('Создаю юзера...');

        $user = new User();
        $user->first_name = $this->ask('Имя', 'Test');
        $user->email = $this->ask('Email', 'test@foo.bar');
        $user->password = $this->ask('Пароль', 'Secret123!');
        $user->save();

        $this->info('Юзер создан');

    }
}
