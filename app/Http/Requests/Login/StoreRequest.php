<?php

namespace App\Http\Requests\Login;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email:filter', 'max:100'],
            'password' => ['required', 'string', Password::defaults()],
            'remember' => ['nullable', 'boolean'],
        ];
    }
}
