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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
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

    public function isEmailConfirmed()
    {
        return (bool) $this->email_confirmed_at;
    }
    
}
