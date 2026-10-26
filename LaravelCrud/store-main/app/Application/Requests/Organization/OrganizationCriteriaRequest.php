<?php

namespace App\Application\Requests\Organization;

use App\Application\Dto\Organization\OrganizationDtoCriteria;
use DateTimeImmutable;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class OrganizationCriteriaRequest extends FormRequest
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
            'name' => ['nullable', 'string', 'max:255'],
            'post_code' => ['nullable', 'string', 'max:20'],
            'country' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'street' => ['nullable', 'string', 'max:255'],
            'number' => ['nullable', 'string', 'max:20'],

            'createdFrom' => ['nullable', 'date'],
            'createdTo' => ['nullable', 'date', 'after_or_equal:createdFrom'],
        ];
    }

    public function toDto(): OrganizationDtoCriteria
    {
        return new OrganizationDtoCriteria(
            id: $this->filled('id') ? $this->integer('id') : null,
            name: $this->input('name'),
            postCode: $this->input('post_code'),
            country: $this->input('country'),
            city: $this->input('city'),
            street: $this->input('street'),
            number: $this->input('number'),

            createdFrom: $this->filled('createdFrom')
                ? new DateTimeImmutable($this->input('createdFrom'))
                : null,

            createdTo: $this->filled('createdTo')
                ? new DateTimeImmutable($this->input('createdTo'))
                : null,
        );
    }
}