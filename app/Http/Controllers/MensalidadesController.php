<?php

namespace App\Http\Controllers;

use App\Matricula;
use App\Mensalidade;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class MensalidadesController extends Controller
{
    public function index()
    {
        $matriculas = Matricula::select('matriculas.*')->orderBy('alunos.nome', 'asc');
        $matriculas = $matriculas->join('alunos', 'matriculas.id_aluno', '=', 'alunos.id');
        $matriculas = $matriculas->get()->pluck('descricao_matricula', 'id');
        $mensalidades = new Collection([]);
        $matricula = request()->get('id_matricula');
        if (!empty($matricula)) {
            $mensalidades = Mensalidade::where('id_matricula', $matricula)->orderBy('numero', 'asc')->get();
        }
        return view('mensalidades.index', compact('matriculas', 'mensalidades'));
    }

    public function show(Mensalidade $mensalidade)
    {
        return view('mensalidades.show', compact('mensalidade'));
    }


}
