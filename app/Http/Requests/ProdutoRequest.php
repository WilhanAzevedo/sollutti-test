<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

/*
● Nome
    ○ String;
    ○ máx 60 caracteres;
    ○ min 3 caracteres;
    ○ mensagem de erros para cada validação em português;
● Valor
    ○ Integer
    ○ Mínimo de 2 caracteres;
    ○ Máximo de 6 caracteres;
    ○ Mensagem de erro para cada validação em português;
● Loja_id;
    ○ Integer;
● Ativo
    ○ Boolean;

*/

class ProdutoRequest extends FormRequest
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
            'nome' => 'required|min:3|max:60',
            'valor' => 'required|min:2|max:6',
            'loja_id' => 'required|integer',
            'ativo' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório',
            'nome.min' => 'O nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O nome deve ter no máximo 60 caracteres',
            'valor.required' => 'O valor é obrigatório',
            'valor.min' => 'O valor deve ter no mínimo 2 caracteres',
            'valor.max' => 'O valor deve ter no máximo 6 caracteres',
            'loja_id.required' => 'A loja é obrigatória',
            'loja_id.integer' => 'A loja deve ser um número inteiro',
            'ativo.required' => 'O ativo é obrigatório',
            'ativo.boolean' => 'O ativo deve ser um booleano',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json($validator->errors(), 422)
        );
    }
}
