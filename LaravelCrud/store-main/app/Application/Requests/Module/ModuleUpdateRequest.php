<?php


namespace App\Application\Requests\Module;
use App\Application\Dto\Module\ModuleDtoUpdate;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ModuleUpdateRequest extends FormRequest
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
            'id' => ['required', 'integer', 'exists:module,id'],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0', 'decimal:0,2'],
        ];
    }
    public function toDto(): ModuleDtoUpdate
    {
        return new ModuleDtoUpdate(
          id: (int) $this->input('id'),
        name: (string) $this->input('name'),
        price: (float) $this->input('price'),
        );
    }
}
