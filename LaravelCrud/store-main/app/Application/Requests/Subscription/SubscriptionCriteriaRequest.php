<?php

namespace App\Application\Requests\Subscription;

use App\Application\Dto\Subscription\SubscriptionDtoCriteria;
use DateTimeImmutable;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SubscriptionCriteriaRequest extends FormRequest
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

            'organization_id' => ['nullable', 'integer', 'exists:organization,id'],
            'module_id' => ['nullable', 'integer', 'exists:module,id'],

            'date_start_from' => ['nullable', 'date'],
            'date_start_to' => ['nullable', 'date', 'after_or_equal:date_start_from'],

            'date_finish_from' => ['nullable', 'date'],
            'date_finish_to' => ['nullable', 'date', 'after_or_equal:date_finish_from'],

            'is_active' => ['nullable', 'boolean'],

            'createdFrom' => ['nullable', 'date'],
            'createdTo' => ['nullable', 'date', 'after_or_equal:createdFrom'],
        ];
    }

    public function toDto(): SubscriptionDtoCriteria
    {
        return new SubscriptionDtoCriteria(
            id: $this->filled('id') ? $this->integer('id') : null,

            organizationId: $this->filled('organization_id')
                ? $this->integer('organization_id')
                : null,

            moduleId: $this->filled('module_id')
                ? $this->integer('module_id')
                : null,

            dateStartFrom: $this->filled('date_start_from')
                ? new DateTimeImmutable($this->input('date_start_from'))
                : null,

            dateStartTo: $this->filled('date_start_to')
                ? new DateTimeImmutable($this->input('date_start_to'))
                : null,

            dateFinishFrom: $this->filled('date_finish_from')
                ? new DateTimeImmutable($this->input('date_finish_from'))
                : null,

            dateFinishTo: $this->filled('date_finish_to')
                ? new DateTimeImmutable($this->input('date_finish_to'))
                : null,

            isActive: $this->filled('is_active')
                ? (bool) $this->input('is_active')
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
