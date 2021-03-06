<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infracao extends Model
{
    protected $fillable = ['descricao','codigo'];

    public function artigos(){
        return $this->hasMany(Artigo::class);
    }
}
