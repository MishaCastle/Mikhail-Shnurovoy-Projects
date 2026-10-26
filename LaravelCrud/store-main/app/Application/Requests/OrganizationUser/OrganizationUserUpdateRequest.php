<?php

namespace App\Application\Requests\OrganizationUser;

use App\Application\Dto\OrganizationUser\OrganizationUserDtoUpdate;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class OrganizationUserUpdateRequest extends FormRequest
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
                'required',
                'integer',
                'exists:organization_user,id',
            ],

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

    public function toDto(): OrganizationUserDtoUpdate
    {
        return new OrganizationUserDtoUpdate(
            id: $this->integer('id'),
            organizationId: $this->integer('organization_id'),
            userId: $this->integer('user_id'),
        );
    }
}