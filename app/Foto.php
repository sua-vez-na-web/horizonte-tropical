<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Foto extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'ocorrencia_id',
        'url',
    ];

    public function ocorrencia()
    {
        return $this->belongsTo(Ocorrencia::class);
    }
}
