<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infracao extends Model
{
    protected $fillable = ['codigo','descricao'];
}
