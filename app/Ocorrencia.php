<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ocorrencia extends Model
{

    protected $fillable = ['apartamento_id','infracao_id','penalidade','tipo','multa','detalhes','data'];

    protected $dates = [ 'data'];

    public function apartamento(){
        return $this->belongsTo(Apartamento::class);
    }

    public function infracao(){
        return $this->belongsTo(Infracao::class);
    }
}
