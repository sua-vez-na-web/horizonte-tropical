<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ocorrencia extends Model
{
    use SoftDeletes;

    CONST STATUS_REGISTRADA = 1;
    CONST STATUS_NOTIFICADA = 2;
    CONST STATUS_EM_ANALISE = 3;
    CONST STATUS_CONCLUIDA  = 4;
    CONST STATUS_NEGADA = 5;

    CONST TIPO_NOTIFICACAO = 1;
    CONST TIPO_LEVE        = 2;
    CONST TIPO_MEDIA       = 3;
    CONST TIPO_GRAVE       = 4;

    CONST VALOR_NOTIFICACAO = 0;
    CONST VALOR_LEVE = 66;
    CONST VALOR_MEDIA = 132;
    CONST VALOR_GRAVE = 165;

    protected $fillable = [
        'apartamento_id',
        'infracao_id',
        'penalidade',
        'tipo',
        'status',
        'baixada',
        'multa',
        'detalhes',
        'data',
        'autor_id',
        'reclamante_id'
    ];


    public static function calculaValorMulta($tipo,$reicidencias_qty)
    {
        if($reicidencias_qty > 0){
            switch($tipo) {
                case self::TIPO_LEVE;
                    return self::VALOR_LEVE * $reicidencias_qty;
                break;

                case self::TIPO_MEDIA;
                    return self::VALOR_MEDIA * $reicidencias_qty;
                break;

                case self::TIPO_GRAVE;
                    return self::VALOR_GRAVE * $reicidencias_qty;
                break;
            }
        }
    }

    public function getStatus($status)
    {
        switch($status) {
            case self::STATUS_EM_ANALISE;
                return ['status'=>'Em Análise','class'=>'warning'];
            break;

            case self::STATUS_REGISTRADA;
                return ['status'=> 'Registrada','class' => 'primary'];
            break;

            case self::STATUS_NOTIFICADA;
                return ['status'=>'Notificada','class' => 'success'];
            break;

            case self::STATUS_CONCLUIDA;
                return ['status'=>'Concluída','class' => 'success'];
            break;

            case self::STATUS_NEGADA;
                return ['status'=>'Negada','class' => 'success'];
            break;
        }

    }

    public function getPenalidade($penalidade)
    {
        switch($penalidade) {
            case self::TIPO_NOTIFICACAO;
                return ['status'=>'Notificação','class'=>'success'];
            break;
            case self::TIPO_LEVE;
                return ['status'=>'Leve','class'=>'primary'];
            break;

            case self::TIPO_MEDIA;
                return ['status'=> 'Média','class' => 'warning'];
            break;

            case self::TIPO_GRAVE;
                return ['status'=>'Grave','class' => 'danger'];
            break;

            default:
                return ['status' => 'Nenhuma','class' => 'secondary'];
        }
    }

    protected $dates = [ 'data'];

    public function apartamento()
    {
        return $this->belongsTo(Apartamento::class);
    }

    public function infracao()
    {
        return $this->belongsTo(Infracao::class);
    }

    public function fotos()
    {
        return $this->hasMany(Foto::class);
    }

    public function reclamante()
    {
        return $this->belongsTo(Pessoa::class,'reclamante_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class,'autor_id');
    }
}
