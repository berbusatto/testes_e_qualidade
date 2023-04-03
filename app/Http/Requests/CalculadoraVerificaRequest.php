<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CalculadoraVerificaRequest extends FormRequest
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
            'valor_real' => 'required|numeric|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'valor_real.required' => 'O campo  é obrigatório.',
            'valor_real.numeric' => 'O valor deve ser um número.',
            'valor_real.min' => 'O valor deve ser maior ou igual a :min.',
        ];
    }
}
