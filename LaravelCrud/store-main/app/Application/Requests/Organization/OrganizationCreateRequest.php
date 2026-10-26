<?php

namespace App\Application\Requests\Organization;

use App\Application\Dto\Organization\OrganizationDtoCreate;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class OrganizationCreateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'post_code' => ['required', 'string', 'max:20'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'street' => ['required', 'string', 'max:255'],
            'number' => ['required', 'string', 'max:20'],
        ];
    }

    public function toDto(): OrganizationDtoCreate
    {
        return new OrganizationDtoCreate(
            name: (string) $this->input('name'),
            postCode: (string) $this->input('post_code'),
            country: (string) $this->input('country'),
            city: (string) $this->input('city'),
            street: (string) $this->input('street'),
            number: (string) $this->input('number'),
        );
    }
}