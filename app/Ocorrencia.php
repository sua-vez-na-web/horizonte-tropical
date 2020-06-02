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

    protected $fillable = [
        'apartamento_id',
        'infracao_id',
        'artigo_id',
        'penalidade_id',
        'tipo',
        'status',
        'baixada',
        'multa',
        'detalhes',
        'data',
        'autor_id',
        'reclamante_id',
    ];

    protected $dates = [ 'data'];

    public static function contaReicidencias($ocorrencia)
    {
        return Ocorrencia::where('apartamento_id',$ocorrencia->apartamento_id)
                                    ->where('artigo_id',$ocorrencia->artigo_id)
                                    ->whereNotIn('id',[$ocorrencia->id])
                                    ->count();
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

    public function apartamento()
    {
        return $this->belongsTo(Apartamento::class);
    }

    public function infracao()
    {
        return $this->belongsTo(Infracao::class);
    }

    public function artigo()
    {
        return $this->belongsTo(Artigo::class);
    }

    public function penalidade()
    {
        return $this->belongsTo(Penalidade::class);
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
