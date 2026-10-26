<?php

namespace App\Application\Requests\OrganizationUser;

use App\Application\Dto\OrganizationUser\OrganizationUserDtoCreate;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class OrganizationUserCreateRequest extends FormRequest
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
            'organization_id' => [
                'required',
                'integer',
                'exists:organization,id',
            ],

            'user_id' => [
                'required',
                'integer',
                'exists:user,id',
            ],
        ];
    }

    public function toDto(): OrganizationUserDtoCreate
    {
        return new OrganizationUserDtoCreate(
            organizationId: $this->integer('organization_id'),
            userId: $this->integer('user_id'),
        );
    }
}