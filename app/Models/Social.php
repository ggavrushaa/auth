<?php

namespace App\Models;

use App\Traits\HasUuid;
use App\Traits\BelongsToUser;
use App\Enums\Social\SocialDriverEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Social extends Model
{
    use HasFactory;
    use HasUuid;
    use BelongsToUser;

    protected $fillable = [
        'uuid',
        'user_id',
        'driver',
        'driver_user_id',
    ];

    protected $casts = [
        'driver' => SocialDriverEnum::class,
    ];

    
    
}
