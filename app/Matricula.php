<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table = 'matriculas';

    protected $fillable = [
        'id_aluno',
        'id_categoria',
        'data',
        'quantidade_meses'
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'id_aluno');
    }
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }


}
