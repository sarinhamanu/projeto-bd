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
            'cpf' => 'required|max:11|min:11|unique:usuarios,cpf',
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

    public  function messages()
    {
        return [
            'nome.required' => 'o campo nome e obrigatório',
            'nome.max' => 'o campo nome deve conter no maximo 80 caracteres',
            'nome.min' => 'o campo nome deve conter no minimo 5 caracteres',
            'cpf.required' =>'cpf obrigatório',
            'cpf.max' => ' cpf deve conter no máximo 11 caracteres',
            'cpf.min' =>'cpf deve conter no mínino  11 caracteres',
            'cpf.unique' =>'cpf já cadastrado no sistema',
            'celular.required'=> 'celular obrigatório',
            'celular.max' =>'o celular deve conter no máximo 15 caracteres',
            'celular.min' =>'o celular deve conter no míninimo 10 caracteres',
            'email.required' =>'E-mail obrigatorio',
            'email.email' => 'formato de email inválido',
            'email.unique'=> 'E_mail já cadastrado no sistema',
            'password.required'=>'senha obrigatória'
        ];
    }
}
