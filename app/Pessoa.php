<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pessoa extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'notificar',
        'razao_social',
        'tipo',
        'tipo_cadastro',
        'cpf', 'cnpj',
        'cep',
        'rua',
        'bairro',
        'cidade',
        'uf',
        'complemento'
    ];

    public function apartamentos()
    {
        return $this->hasMany(Apartamento::class);
    }

    public function dependentes()
    {
        return $this->hasMany(Dependente::class);
    }
}
