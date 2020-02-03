<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nome',
        'email',
        'senha',
        'data_cadastro',
        'ultimo_acesso',
        'api_token'
    ];

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $table = "usuarios";

}
