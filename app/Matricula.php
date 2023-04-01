<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table = 'matriculas';

    protected $fillable = [
        'id_aluno',
        'id_categoria',
        'data',
        'quantidade_meses',
        'valor_mensalidade',
        'vencimento_primeira_parcela'
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'id_aluno');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function setDataAttribute($data)
    {
        if (!empty($data)) {
            $this->attributes['data'] = Carbon::createFromFormat('d/m/Y', $data)->toDateString();
        }
    }
    public function setVencimentoPrimeiraParcelaAttribute($vencimento)
    {
        if (!empty($vencimento)) {
            $this->attributes['vencimento_primeira_parcela'] = Carbon::createFromFormat('d/m/Y', $vencimento)->toDateString();
        }
    }
}
