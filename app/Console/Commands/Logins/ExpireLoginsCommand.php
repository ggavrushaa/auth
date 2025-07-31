<?php

namespace App\Console\Commands\Logins;

use App\Models\Login;
use Illuminate\Console\Command;
use App\Enums\Logins\LoginStatusEnum;

class ExpireLoginsCommand extends Command
{
    protected $signature = 'logins:expire';

    public function handle()
    {
        $this->warn('Expire logins');

        $this->expireLogins();

        $this->info('Done');
    }

    private function expireLogins(): void
    {
        Login::query()
            ->where('status', LoginStatusEnum::confirmation)
            ->where('created_at', '<=', now()->subHours(1))
            ->update(['status' => LoginStatusEnum::expired]);
    }
}
