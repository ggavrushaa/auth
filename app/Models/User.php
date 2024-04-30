<?php

namespace App\Models;

use App\Enums\GenderEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'online_at',
        'first_name', 'middle_name', 'last_name',
        'email', 'email_confirmed_at',
        'password',
        'gender', 'password_at',
    ];

    protected $casts = [
        'gender' => GenderEnum::class,
        'online_at' => 'datetime',
        'password' => 'hashed',
        'password_at' => 'datetime',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getFullName()
    {
        return implode(' ', array_filter([
            $this->first_name,
            $this->middle_name,
            $this->last_name
        ]));
    }

    public function securePassword()
    {
        return "********";
    }

    public function updatePassword(string $password): bool
    {
        return $this->update([
            'password' => $password,
            'password_at' => now(),
        ]);
    }

    public function isEmailConfirmed(): bool
    {
        return (bool) $this->email_confirmed_at;
    }

    public function confirmEmail(): bool
    {
        return $this->update(['email_confirmed_at' => now()]);
    }
    
}
