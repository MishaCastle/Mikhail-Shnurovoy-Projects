<?php

namespace App\Application\Requests\OrganizationUser;

use App\Application\Dto\OrganizationUser\OrganizationUserDtoCriteria;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class OrganizationUserCriteriaRequest extends FormRequest
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
            'id' => [
                'nullable',
                'integer'
            ],

            'organization_id' => [
                'nullable',
                'integer'
            ],

            'user_id' => [
                'nullable',
                'integer'
            ],
        ];
    }

    public function toDto(): OrganizationUserDtoCriteria
    {
        return new OrganizationUserDtoCriteria(
            id: $this->filled('id')
                ? $this->integer('id')
                : null,

            organizationId: $this->filled('organization_id')
                ? $this->integer('organization_id')
                : null,

            userId: $this->filled('user_id')
                ? $this->integer('user_id')
                : null,
        );
    }
}