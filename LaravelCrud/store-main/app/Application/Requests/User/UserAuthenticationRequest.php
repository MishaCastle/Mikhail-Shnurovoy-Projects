<?php

namespace App\Application\Requests\User;

use App\Application\Dto\User\UserDtoCreate

;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserAuthenticationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'login' => ['required', 'string', 'max:255' ],
            'password' => ['required', 'string', 'min:8']
        ];
    }

  
}