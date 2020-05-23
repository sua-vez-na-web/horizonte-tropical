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
            'tecnica'        => 'required',
            'bloco_id'       => 'required_if:tecnica,==,0',
            'apartamento_id' => 'required_if:tecnica,==,0',
            'empresa'        => 'required_if:tecnica,==,1',
        ];
    }

    public function messages(){
        return [
            'required' => 'O campo :attribute é obrigatório',
            'required_if' => 'O campo :attribute é obrigatório para o tipo de registro',
            'string' => 'O campo :attribute nao é um texto',
            'min'   => 'O campo :attribute é muito curto'
        ];
    }

    public function attributes()
    {
        return [
            'bloco_id' => 'Bloco',
            'apartamento_id' => 'Apartamento',
        ];
    }
}
