<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ponto extends Model
{
    protected $fillable = ['mes','ano','url','usuario_id'];
}
