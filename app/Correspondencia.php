<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Correspondencia extends Model
{
    use SoftDeletes;

    const STATUS_ENTREGE = 1;
    const STATUS_NAO_ENTREGUE = 0;

    const TIPO_CORRES_AGUA = 1;
    const TIPO_CORRES_ENERGIA = 2;
    const TIPO_CORRES_INTERNET = 3;
    const TIPO_CORRES_TAXA = 4;
    const TIPO_CORRES_OUTROS = 5;


    protected $fillable = [
        'uuid',
        'data_recebimento',
        'data_entrega',
        'apartamento_id',
        'recebedor_id',
        'detalhes',
        'tipo',
        'status'
    ];

    protected $dates = ['data_recebimento','data_entrega'];

    public function apartamento(){
        return $this->belongsTo(Apartamento::class);
    }

    public function recebedor(){
        return $this->belongsTo(Pessoa::class,'recebedor_id');
    }

}
