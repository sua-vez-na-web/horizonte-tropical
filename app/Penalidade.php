<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penalidade extends Model
{
    protected $fillable = ['descricao','multa'];

    public function artigo(){
        return $this->belongsTo(Artigo::class);
    }
}
