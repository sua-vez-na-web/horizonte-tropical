<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artigo extends Model
{
    protected $fillable = ['descricao','codigo','infracao_id','penalidade_id'];


    public function infracao()
    {
        return $this->belongsTo(Infracao::class);
    }

    public function penalidade()
    {
        return $this->belongsTo(Penalidade::class);
    }
}
