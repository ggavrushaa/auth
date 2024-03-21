<?php

namespace App\Console\Commands\Passwords;

use App\Models\Password;
use Illuminate\Console\Command;
use App\Enums\PasswordStatusEnum;

class ExpirePasswordsCommand extends Command
{
    protected $signature = 'passwords:expire';

    public function handle()
    {
        $this->warn('Expire passwords');

        $this->expirePasswords();

        $this->info('Done');
    }

    private function expirePasswords(): void
    {
        Password::query()
            ->where('status', PasswordStatusEnum::pending)
            ->where('created_at', '<=', now()->subHours(1))
            ->update(['status' => PasswordStatusEnum::expired]);
    }
}
