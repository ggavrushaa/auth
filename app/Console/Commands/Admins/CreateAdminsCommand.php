<?php

namespace App\Console\Commands\Admins;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Console\Command;

class CreateAdminsCommand extends Command
{
    protected $signature = 'admins:create';

    public function handle()
    {
        $this->warn('Создаю админа...');

        $admin = new Admin();
        $admin->name = $this->ask('Имя', 'Test');
        $admin->email = $this->ask('Email', 'test@foo.bar');
        $admin->password = $this->ask('Пароль', 'Secret123!');
        $admin->save();

        $this->info('Админ создан');

    }
}
