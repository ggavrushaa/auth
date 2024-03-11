<?php

namespace App\Http\Requests\User\Settings\Password;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'current_password' => ['required', 'string', 'current_password', ],
            'password' => ['required', 'string', Password::defaults(), ],
        ];
    }
}
