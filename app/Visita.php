<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visita extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'apartamento_id',
        'agendado',
        'dh_entrada',
        'dh_saida',
        'tipo_autorizacao',
        'morador_presente',
        'detalhes',
        'autorizado_por',
        'nome_visitante',
        'rg_visitante',
        'tecnica',
        'empresa'
    ];

    protected $dates = ['dh_entrada','dh_saida'];


    public function apartamento()
    {
        return $this->belongsTo(Apartamento::class);
    }

    public function duracao()
    {
        $saida   = $this->dh_saida ?: now();
        $duracao = $this->dh_entrada->longAbsoluteDiffForHumans($saida);

        return $duracao;
    }


}
