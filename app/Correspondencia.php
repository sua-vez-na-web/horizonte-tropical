<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correspondencia extends Model
{
    protected $fillable = ['data_recebimento','data_entrega','apartamento_id','detalhes'];

    protected $dates = ['data_recebimento','data_entrega'];

    public function apartamento(){
        return $this->belongsTo(Apartamento::class);
    }
}
