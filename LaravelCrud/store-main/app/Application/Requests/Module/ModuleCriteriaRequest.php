<?php

namespace App\Application\Requests\Module;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Application\Dto\Module\ModuleDtoCriteria;
use DateTimeImmutable;
class ModuleCriteriaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => ['nullable', 'integer'],
            'name' => ['nullable', 'string', 'max:255'],

            'priceFrom' => ['nullable', 'numeric', 'min:0'],
            'priceTo' => ['nullable', 'numeric', 'gte:priceFrom'],

            'createdFrom' => ['nullable', 'date'],
            'createdTo' => ['nullable', 'date', 'after_or_equal:createdFrom'],
        ];
    }
     public function toDto(): ModuleDtoCriteria
    {
        return new ModuleDtoCriteria(
            id: $this->filled('id') ? $this->integer('id') : null,
            name: $this->input('name'),

            priceFrom: $this->filled('priceFrom')
                ? (float) $this->input('priceFrom')
                : null,

            priceTo: $this->filled('priceTo')
                ? (float) $this->input('priceTo')
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
