<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

/*
● Nome da Loja
    ○ String
    ○ máx 40 caracteres;
    ○ min 3 caracteres;
    ○ mensagem de erros para cada validação em português;
● Email
    ○ String
    ○ Deve ser do tipo email
    ○ Deve ser único;
    ○ mensagem de erros para cada validação em português
*/

class LojaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|min:3|max:40',
            'email' => 'required|email|unique:lojas',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório',
            'nome.min' => 'O nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O nome deve ter no máximo 40 caracteres',
            'email.required' => 'O email é obrigatório',
            'email.email' => 'O email deve ser do tipo email',
            'email.unique' => 'O email já está cadastrado',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json($validator->errors(), 422)
        );
    }
}
