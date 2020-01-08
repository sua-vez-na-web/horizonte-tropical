<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Garagem extends Model
{
    protected $fillable = ['apartamento_id','veiculo','placa'];

    public function apartamento(){
        return $this->belongsTo(Apartamento::class);
    }
}
