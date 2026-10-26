<?php

namespace App\Application\Requests\Organization;

use App\Application\Dto\Organization\OrganizationDtoUpdate;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class OrganizationUpdateRequest extends FormRequest
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
            'id' => ['required', 'integer', 'exists:organization,id'],
            'name' => ['required', 'string', 'max:255'],
            'post_code' => ['required', 'string', 'max:20'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'street' => ['required', 'string', 'max:255'],
            'number' => ['required', 'string', 'max:20'],
        ];
    }

    public function toDto(): OrganizationDtoUpdate
    {
        return new OrganizationDtoUpdate(
            id: $this->integer('id'),
            name: (string) $this->input('name'),
            postCode: (string) $this->input('post_code'),
            country: (string) $this->input('country'),
            city: (string) $this->input('city'),
            street: (string) $this->input('street'),
            number: (string) $this->input('number'),
        );
    }
}