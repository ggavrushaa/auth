<?php

namespace App\Console\Commands\Email;

use App\Models\Email;
use App\Models\Password;
use Illuminate\Console\Command;
use App\Enums\PasswordStatusEnum;
use App\Enums\Email\EmailStatusEnum;

class ExpireEmailsCommand extends Command
{
    protected $signature = 'emails:expire';

    public function handle()
    {
        $this->warn('Expire email');

        $this->expireEmail();

        $this->info('Done');
    }

    private function expireEmail(): void
    {
        Email::query()
            ->where('status', EmailStatusEnum::pending)
            ->where('created_at', '<=', now()->subDays(3))
            ->update(['status' => EmailStatusEnum::expired]);
    }
}
