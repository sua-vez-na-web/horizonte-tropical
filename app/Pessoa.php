<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $fillable = ['nome', 'email', 'telefone', 'notificar', 'razao_social', 'tipo', 'tipo_cadastro', 'cpf', 'cnpj'];

    public function apartamentos()
    {
        return $this->hasMany(Apartamento::class);
    }

    public function dependentes()
    {
        return $this->hasMany(Dependente::class);
    }
}
