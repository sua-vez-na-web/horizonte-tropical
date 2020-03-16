<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Garagem extends Model
{
    use SoftDeletes;

    const ORIGEM_PROPRIA = 1;
    const ORIGEM_TERCEIROS = 2;

    protected $fillable = [
        'apartamento_id',
        'veiculo',
        'placa',
        'origem',
        'apto_cedente',
        'file'
    ];

    public function apartamento(){
        return $this->belongsTo(Apartamento::class);
    }

    public function cedente(){
        return $this->belongsTo(Apartamento::class,'apto_cedente');
    }

}
