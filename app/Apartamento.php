<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartamento extends Model
{
    protected $fillable = [ 'bloco_id','proprietario_id','codigo','garagens','prop_residente','status'];

    public function proprietario(){
        return $this->belongsTo(Pessoa::class,'proprietario_id');
    }

    public function bloco(){
        return $this->belongsTo(Bloco::class);
    }

    public function garagens(){
        return $this->hasMany(Garagem::class);
    }

    public function correspondencias(){
        return $this->hasMany(Correspondencia::class);
    }

    public function infracoes(){
        return $this->hasMany(Ocorrencia::class);
    }

}
