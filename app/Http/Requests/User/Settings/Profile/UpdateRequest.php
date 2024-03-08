<?php

namespace App\Http\Requests\User\Settings\Profile;

use App\Enums\GenderEnum;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['nullable', 'string', 'max:50'],
            'middle_name' => ['nullable', 'string', 'max:50'],
            'gender' => ['required', 'string', Rule::enum(GenderEnum::class)],
            'email' => ['nullable', ],
            'password' => ['nullable', ],
        ];
    }
}
