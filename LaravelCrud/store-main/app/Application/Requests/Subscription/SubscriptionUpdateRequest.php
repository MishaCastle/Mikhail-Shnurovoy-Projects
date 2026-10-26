<?php

namespace App\Application\Requests\Subscription;

use App\Application\Dto\Subscription\SubscriptionDtoUpdate;
use DateTimeImmutable;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SubscriptionUpdateRequest extends FormRequest
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
            'id' => ['required', 'integer', 'exists:subscription,id'],

            'organization_id' => ['required', 'integer', 'exists:organization,id'],
            'module_id' => ['required', 'integer', 'exists:module,id'],

            'date_start' => ['required', 'date'],
            'date_finish' => ['required', 'date', 'after_or_equal:date_start'],

            'is_active' => ['required', 'boolean'],
        ];
    }

    public function toDto(): SubscriptionDtoUpdate
    {
        return new SubscriptionDtoUpdate(
            id: $this->integer('id'),
            organizationId: $this->integer('organization_id'),
            moduleId: $this->integer('module_id'),
            dateStart: new DateTimeImmutable($this->input('date_start')),
            dateFinish: new DateTimeImmutable($this->input('date_finish')),
            isActive: (bool) $this->input('is_active'),
        );
    }
}
