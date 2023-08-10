<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class usuarioRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|max:80|min:5',
            'cpf' => 'required|max:11|min:11',
            'celular' => 'required|max:15|min:10',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|'
        ];
    }

    public function failedvalidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error'  => $validator->errors()
        ]));
    }
}
