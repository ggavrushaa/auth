<?php

namespace App\Http\Requests\Password;

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
            'email' => 'required', 'string', 'email', 'max:100',
        ];
    }
}
