<?php

namespace App\Enums\Email;

enum EmailStatusEnum: string
{
    case pending = 'pending';
    case completed = 'completed';
    case expired = 'expired';

    public function is(self $status): bool
    {
        return $this === $status;
    }
}
