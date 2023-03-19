<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $table = 'alunos';

    protected $fillable = [
        'nome',
        'nascimento',
        'sexo',
        'endereco',
        'numero',
        'complemento',
        'bairro',
        'municipio',
        'uf',
        'cep',
        'email',
        'telefone',
        'responsavel',
        'parentesco'
    ];

    public function setNascimentoAttribute($nascimento)
    {
        if (!empty($nascimento)) {
            $this->attributes['nascimento'] = Carbon::createFromFormat('d/m/Y', $nascimento)->toDateString();
        }
    }

    public function getEnderecoCompletoAttribute()
    {
        $enderecoCompleto = $this->attributes['endereco'] . ', ' . $this->attributes['numero'];
        if (!empty($this->attributes['complemento'])) {
            $enderecoCompleto .= ' - ' . $this->attributes['complemento'];
        }
        if (!empty($this->attributes['bairro'])) {
            $enderecoCompleto .= ' - ' . $this->attributes['bairro'];
        }
        if (!empty($this->attributes['cep'])) {
            $enderecoCompleto .= ' - CEP: ' . $this->attributes['cep'];
        }
        $enderecoCompleto .= '  ' . $this->cidade. '-' . $this->uf;
        return $enderecoCompleto;
    }
}
