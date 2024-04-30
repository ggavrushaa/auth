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
    ];

    protected $casts = [
        'status' => EmailStatusEnum::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function updateStatus(EmailStatusEnum $status): bool
    {
        if($this->status->is($status)) {
            return false;
        }

        return $this->update(['status' => $status]);
    }
}
