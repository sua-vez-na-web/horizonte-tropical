<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Correspondencia extends Model
{
    protected $fillable = ['data_recebimento','data_entrega','apartamento_id','detalhes','status'];

    protected $dates = ['data_recebimento','data_entrega'];

    public function apartamento(){
        return $this->belongsTo(Apartamento::class);
    }

    public function setDataRecebimentoAttribute($value){
        $this->attributes['data_recebimento'] = Carbon::parse($value);
    }

    public function setDataEntregaAttribute($value){
        $this->attributes['data_entrega'] = Carbon::parse($value);
    }
}
