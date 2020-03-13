<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ponto extends Model
{
    protected $fillable = ['mes','ano','url','usuario_id'];

    public function funcionario()
    {
        return $this->belongsTo(User::class,'usuario_id');
    }
}
