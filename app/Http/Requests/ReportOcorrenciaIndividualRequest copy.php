<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportOcorrenciaIndividualRequest extends FormRequest
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
            'bloco_id'  => 'required',
            'apto_id'   => 'required',
            'dt_inicio' => 'required|date',
            'dt_final'  => 'required|date'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatorio',
            'date' => 'O campo :attribute não é do tipo data',
        ];
    }

    public function attributes()
    {
        return [
            'dt_inicio' => 'Data Inicio',
            'dt_final'  => 'Data Final',
            'apto_id'   => 'Apartamento',
            'bloco_id'  => 'Bloco'
        ];
    }
}
