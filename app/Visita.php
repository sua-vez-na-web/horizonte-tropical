<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    protected $fillable = ['apartamento_id','agendado','dataHora_entrada','dataHora_saida','dataHora_agendamento',
        'tipo_autorizacao','morador_presente','detalhes','autorizado_por'];

    protected $dates = ['dataHora_entrada','dataHora_saida','dataHora_agendamento'];

    public function apartamento(){
        return $this->belongsTo(Apartamento::class);
    }

}
