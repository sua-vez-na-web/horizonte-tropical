<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
             'name' => 'required|min:3',
             'email' => 'required|email|unique:users',
             'password' => 'required|min:4',
             'cargo' => 'required',
             'cpf'  => 'required|unique:users'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'email' => 'O campo :attribute precisa ser um email válido',
            'min'   => 'O Campo :attribute é muito curto o minimo é 4',
            'unique' => 'O Campo :attribute já está em uso'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nome',
            'email' => 'E-mail',
            'password' => 'Senha'
        ];
    }
}
