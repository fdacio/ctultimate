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

    public $situacoes = [
        self::SITUACAO_NAO_PAGA => 'Não Paga',
        self::SITUACAO_PAGA => 'Paga',
        self::SITUACAO_POR_CONTA => 'Paga por Conta',
        self::SITUACAO_CANCELADA => 'Cancelada'
    ];

    public function getSituacaoMensalidadeAttribute()
    {
        return $this->situacoes[$this->situacao];
    }

    public function getSituacaoCorAttribute()
    {
        switch($this->situacao) {
            case self::SITUACAO_NAO_PAGA : return 'text-danger';
            case self::SITUACAO_PAGA : return 'text-success';
            case self::SITUACAO_POR_CONTA : return 'text-warning';
            case self::SITUACAO_CANCELADA : return 'text-danger';

        }
    }

}
