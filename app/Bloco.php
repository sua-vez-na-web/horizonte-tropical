<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bloco extends Model
{
    protected $fillable = ['bloco', 'codigo'];

    public function apartamentos()
    {
        return $this->hasMany(Apartamento::class, 'bloco_id');
    }
}
