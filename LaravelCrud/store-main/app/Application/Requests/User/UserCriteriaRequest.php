<?php

namespace App\Application\Requests\User;

use App\Application\Dto\User\UserDtoCriteria;
use DateTimeImmutable;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserCriteriaRequest extends FormRequest
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
            'id' => ['nullable', 'integer'],

            'first_name' => ['nullable', 'string', 'max:255'],
            'second_name' => ['nullable', 'string', 'max:255'],

            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],

            'login' => ['nullable', 'string', 'max:255'],

            'is_verify_email' => ['nullable', 'boolean'],
            'is_verify_phone' => ['nullable', 'boolean'],

            'createdFrom' => ['nullable', 'date'],
            'createdTo' => ['nullable', 'date', 'after_or_equal:createdFrom'],
        ];
    }

    public function toDto(): UserDtoCriteria
    {
        return new UserDtoCriteria(
            id: $this->filled('id')
                ? $this->integer('id')
                : null,

            firstName: $this->input('first_name'),
            secondName: $this->input('second_name'),

            email: $this->input('email'),
            phone: $this->input('phone'),

            login: $this->input('login'),

            isVerifyEmail: $this->filled('is_verify_email')
                ? $this->boolean('is_verify_email')
                : null,

            isVerifyPhone: $this->filled('is_verify_phone')
                ? $this->boolean('is_verify_phone')
                : null,

            createdFrom: $this->filled('createdFrom')
                ? new DateTimeImmutable($this->input('createdFrom'))
                : null,

            createdTo: $this->filled('createdTo')
                ? new DateTimeImmutable($this->input('createdTo'))
                : null,
        );
    }
}