<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'string|required',
            'email' => 'email|required',
            'password' => 'string|required',

        ];
    }

    public function messages(): array
    {
        return [
            'username.string' => 'O nome de usuário precisa ser uma string',
            'password.string' => 'A senha precisa ser uma string',
            'required' => 'Este campo é obrigatório',
            'email' => 'Este campo deve ser um e-mail'
        ];
    }
}
