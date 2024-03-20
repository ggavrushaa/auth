<?php

namespace App\Enums;

enum PasswordStatusEnum: string
{
    case pending = 'pending';
    case completed = 'completed';
    case expired = 'expired';
}
