<?php

namespace App\Application\Requests\Module;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Application\Dto\Module\ModuleDtoCreate;
class ModuleCreateRequest extends FormRequest
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
  
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0', 'decimal:0,2'],
        ];
    }
    public function toDto(): ModuleDtoCreate
    {
        return new ModuleDtoCreate(
            name: (string) $this->input('name'),
            price: (float) $this->input('price'),
        );
    }
}
