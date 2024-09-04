<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use App\Traits\HasUuid;
use App\Enums\Email\EmailStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Email extends Model
{
    use HasFactory;
    use HasUuid;
    use BelongsToUser;

    protected $fillable = [
        'uuid',
        'value',
        'user_id',
        'status',
        'code',
    ];

    protected $casts = [
        'status' => EmailStatusEnum::class,
        'code' => 'encrypted',
    ];

    public static function booted(): void
    {
        self::creating(function (Email $email) {
            $email->code = code();
        });
    }
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function complete(): bool
    {
        return $this->updateStatus(EmailStatusEnum::completed);
    }
    public function updateStatus(EmailStatusEnum $status): bool
    {
        if($this->status->is($status)) {
            return false;
        }

        return $this->update(['status' => $status]);
    }
}
