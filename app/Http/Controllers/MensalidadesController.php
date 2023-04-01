<?php

namespace App\Http\Controllers;

use App\Matricula;
use App\Mensalidade;
use Illuminate\Http\Request;

class MensalidadesController extends Controller
{
    public function index()
    {
        $matriculas = Matricula::pluck('id_aluno', 'id');
        $mensalidades = [];
        $matricula = request()->get('matricula');
        if (!empty($matricula)) {
            $mensalidades = Matricula::where('id_matricula', $matricula)->orderBy('numero', 'asc');
        }
        return view('mensalidades.index', compact('matriculas', 'mensalidades'));
    }

    public function show(Mensalidade $mensalidade)
    {
        return view('mensalidades.show', compact('mensalidade'));
    }


}
