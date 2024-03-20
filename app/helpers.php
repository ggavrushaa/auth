<?php

use Illuminate\Support\Str;

function app_url(string $path = '')
{
    return implode('/', array_filter([
        trim(config('app.url'), '/'),
        trim($path, '/'),
    ]));
}

function uuid(): string
{
    return (string) Str::uuid();
}