<?php

namespace App\Enums;

enum GenderEnum : string
{
    case male = 'male';
    case female = 'female';

    public function name(): string
    {
        return match ($this) {
            self::male => 'Мужчина',
            self::female => 'Женщина',
        };
    }
}
