<?php

namespace App\Enums\Logins;

enum LoginStatusEnum: string
{
        case confirmation = 'confirmation';
    case success = 'success';
    case failed = 'failed';
    case expired = 'expired';

    public function is(self $status): bool
    {
        return $this === $status;
    }
}
