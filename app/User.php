<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const CARGO_SINDICO =1;
    const CARGO_PORTEIRO = 2;

    protected $fillable = [
        'name', 'email', 'password','cargo','ativo','cpf','telefone'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



}
