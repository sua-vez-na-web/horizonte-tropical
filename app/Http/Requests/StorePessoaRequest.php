<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePessoaRequest extends FormRequest
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
            'tipo_cadastro' => 'required',
            'nome'          => 'required|min:3|string'
            // 'email'         => 'required|email|unique:pessoas',            
            // 'telefone'      => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'min'      => 'O campo :attribute é muito curto',
            'unique'   => 'O valor do campo :attribute já está sendo usado',
            'email'    => 'O valor do campo :attribute não parece ser um email válido'
        ];
    }

    public function attributes()
    {
        return [
            'tipo_cadastro' => 'Tipo de Cadastro',
        ];
    }
}
