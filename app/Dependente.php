<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependente extends Model
{
    protected $fillable = ['pessoa_id', 'nome', 'email', 'cpf', 'rg'];

    public function pessoa()
    {
        return $this->belongsTo(Dependente::class);
    }
}
