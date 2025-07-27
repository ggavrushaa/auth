<?php

use App\Support\QrCode\QrCode;
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

function code(): string 
{
    return (string) rand(100_000, 999_999);
}

function qr_code(string $content): QrCode
{
    return new QrCode($content);
}