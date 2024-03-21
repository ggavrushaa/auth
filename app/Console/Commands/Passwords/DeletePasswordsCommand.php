<?php

namespace App\Console\Commands\Passwords;

use App\Models\Password;
use Illuminate\Console\Command;
use App\Enums\PasswordStatusEnum;

class DeletePasswordsCommand extends Command
{
    protected $signature = 'passwords:delete';

    public function handle()
    {
        $this->warn('Delete passwords');

        $this->deletePasswords();

        $this->info('Done');
    }

    private function deletePasswords(): void
    {
        Password::query()
            ->where('status', PasswordStatusEnum::expired)
            ->where('created_at', '<=', now()->subDays(30))
            ->delete();
    }
}
