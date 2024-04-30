<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait HasUuid
{
    public static function bootHasUuid(): void
    {
        static::creating(function (Model $model) {
            $model->forceFill(['uuid' => uuid()]);
        }); 
    }
}
