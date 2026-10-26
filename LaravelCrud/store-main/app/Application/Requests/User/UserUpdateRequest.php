<?php

namespace App\Application\Requests\User;

use App\Application\Dto\User\UserDtoUpdate;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'id' => ['required', 'integer', 'exists:user,id'],

            'first_name' => ['required', 'string', 'max:255'],
            'second_name' => ['required', 'string', 'max:255'],

            'email' => ['required', 'email', 'max:255', 'unique:user,email,' . $this->input('id')],
            'phone' => ['nullable', 'string', 'max:20', 'unique:user,phone,' . $this->input('id')],

            'login' => ['required', 'string', 'max:255', 'unique:user,login,' . $this->input('id')],
            'password' => ['required', 'string', 'min:8']
        ];
    }

    public function toDto(): UserDtoUpdate
    {
        return new UserDtoUpdate(
            id: $this->integer('id'),
            firstName: (string) $this->input('first_name'),
            secondName: (string) $this->input('second_name'),
            email: (string) $this->input('email'),
            phone: $this->input('phone'),
            login: (string) $this->input('login'),
            password: (string) $this->input('password')
        );
    }
}