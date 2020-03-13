<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pessoa extends Model
{
    use SoftDeletes;

    const PROPRIETARIO_RESIDENTE = 1;
    const PROPRIETARIO_NAO_RESIDENTE = 2;
    const INQUILINO = 3;
    const DEPENDENTE = 4;

    const PESSOA_FISICA = 1;
    const PESSOA_JURIDICA = 2;

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
        'complemento',
        'dependente_id'
    ];

    public function apartamentos()
    {
        return $this->hasMany(Apartamento::class);
    }

    public function dependentes()
    {
        return $this->hasMany(Pessoa::class,'dependente_id');
    }

    public static function getMoradores($apto)
    {

        $pessoas = Pessoa::whereIn('dependente_id',[$apto->inquilino_id,$apto->proprietario_id])
                    ->get();

        return $pessoas;
    }

}
