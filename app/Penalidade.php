<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penalidade extends Model
{
    const LEVEL_NOTIFICACAO = 1;
    const LEVEL_LEVE = 2;
    const LEVEL_MEDIA = 3;
    const LEVEL_GRAVE = 4;

    const MULTA_NOTIFICACAO = 0;
    const MULTA_LEVE = 66.0;
    const MULTA_MEDIA = 132.00;
    const MULTA_GRAVE = 165.00;

    protected fillable = [
    	'ocorrencia_id',
    	'apartamento_id',
    	'level_id';    	
    	'nro_incidencia',
    	'multa',
    	'baixada',
    	'data_baixa',
    	'arquivo'
    ];

    public function ocorrencia()
    {
    	return $this->belongsTo(Ocorrencia::class);
    }

    public function apartamento()
    {
    	return $this->belongsTo(Apartamento::class);
    }
    

}
