<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable = [
        'id',
        'nome',
        'sobrenome',
        'idade',
        'sexo',
    ];

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $table = "funcionarios";

}
