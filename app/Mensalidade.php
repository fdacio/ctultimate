<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensalidade extends Model
{
    protected $table = 'mensalidades';

    protected $fillable = [
        'id_matricula',
        'numero',
        'valor',
        'vencimento',
        'situacao'
    ];


    const SITUACAO_NAO_PAGA = 1;
    const SITUACAO_PAGA = 2;
    const SITUACAO_POR_CONTA = 3;
    const SITUACAO_CANCELADA = 4;

}
