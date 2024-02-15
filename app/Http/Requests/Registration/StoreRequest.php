<?php

namespace App\Http\Requests\Registration;

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
            'first_name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email:filter', 'max:100', 'unique:users'],
            'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            'agreement' => ['accepted'],
        ];
    }
}
