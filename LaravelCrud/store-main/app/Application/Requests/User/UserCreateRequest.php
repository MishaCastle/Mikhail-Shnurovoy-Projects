<?php

namespace App\Application\Requests\User;

use App\Application\Dto\User\UserDtoCreate;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    
   public function rules(): array
   {
       return [
           'first_name' => ['required', 'string', 'max:255']
           ,
          'second_name' => ['required', 'string', 'max:255'],

          'email' => ['required', 'email', 'max:255', 'unique:user,email'],
           'phone' => ['nullable', 'string', 'max:20', 'unique:user,phone'],

           'login' => ['required', 'string', 'max:255', 'unique:user,login'],
           'password' => ['required', 'string', 'min:8']
        ];
   }

    public function toDto(): UserDtoCreate
    {
        return new UserDtoCreate(
            firstName: (string) $this->input('first_name'),
            secondName: (string) $this->input('second_name'),
            email: (string) $this->input('email'),
            phone: $this->input('phone'),
            login: (string) $this->input('login'),
            password: (string) $this->input('password')
        );
    }
}