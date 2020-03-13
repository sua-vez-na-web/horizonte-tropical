<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVisitaRequest extends FormRequest
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
            'bloco_id'       => 'required',
            'apartamento_id' => 'required',
            'nome_visitante' => 'required|string|min:3'
        ];
    }

    public function messages(){
        return [
            'required' => 'O campo :attribute é obrigatório',
            'string' => 'O campo :attribute nao é um texto',
            'min'   => 'O campo :attribute é muito curto'
        ];
    }

    public function attributes()
    {
        return [
            'bloco_id' => 'Bloco',
            'apartamento_id' => 'Apartamento',
            'nome_visitante' => 'Visitante'
        ];
    }
}
