<?php

namespace App\Models;

use App\Enums\Logins\LoginStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Traits\HasUuid;

class Login extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        'user_id', 'status', 
        'email', 'remember', 
        'agent', 'ip_address',
    ];

    protected $casts = [
        'status' => LoginStatusEnum::class,
        'remember' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
