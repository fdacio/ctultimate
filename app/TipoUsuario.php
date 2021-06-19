<?php

namespace Cotacao;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    protected $table = 'tipos_usuarios';

    protected $fillable = ['nome'];
}
