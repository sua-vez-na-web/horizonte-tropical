<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infracao extends Model
{
    protected $fillable = ['descricao'];

    public function artigos(){
        return $this->hasMany(Artigo::class);
    }
}
