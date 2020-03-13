<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCorrespondenciaRequest extends FormRequest
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
            'recebedor_id' => 'required',
            'tipo'          => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório'
        ];
    }

    public function attributes()
    {
        return [
            'recebedor_id' => 'Recebedor',
            'tipo'         => 'Tipo do Documento'
        ];
    }
}
