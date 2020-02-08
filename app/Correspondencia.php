<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Correspondencia extends Model
{
    use SoftDeletes;

    protected $fillable = ['uuid','data_recebimento','data_entrega','apartamento_id','detalhes','status'];

    protected $dates = ['data_recebimento','data_entrega'];

    public function apartamento(){
        return $this->belongsTo(Apartamento::class);
    }

}
