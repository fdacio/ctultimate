<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Categoria;
use App\Http\Requests\MatriculaRequest;
use App\Matricula;
use App\Mensalidade;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatriculasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check.mensalidades.pagas')->only('edit', 'destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matriculas = Matricula::select('matriculas.*')->orderBy('alunos.nome', 'asc');
        $matriculas = $matriculas->join('alunos', 'matriculas.id_aluno', '=', 'alunos.id');
        $aluno = request()->get('aluno');
        if (!empty($aluno)) {
            $matriculas = $matriculas->whereHas('aluno', function ($query) use ($aluno) {
                $query = $query->where('nome', 'LIKE', '%' . $aluno . '%');
            });
        }
        $matriculas = $matriculas->paginate(10);
        return view('matriculas.index', compact('matriculas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alunos = Aluno::orderBy('nome')->pluck('nome', 'id');
        $categorias = Categoria::orderBy('nome')->pluck('nome', 'id');
        return view('matriculas.create', compact('alunos', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatriculaRequest $request)
    {
        try {
            DB::beginTransaction();
            $matricula = Matricula::create($request->all());
            $this->geraMensalidade($matricula);
            DB::commit();
            return redirect()->route('matriculas.index')->with('success', 'Matrícula cadastrada com sucesso.');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('matriculas.index')->with('danger', 'Não foi possível cadastrar matrícula: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Matricula $matricula)
    {
        return view('matriculas.show', compact($matricula));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Matricula $matricula)
    {
        $alunos = Aluno::orderBy('nome')->pluck('nome', 'id');
        $categorias = Categoria::orderBy('nome')->pluck('nome', 'id');
        return view('matriculas.edit', compact('matricula', 'alunos', 'categorias'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MatriculaRequest $request, Matricula $matricula)
    {
        $matricula->update($request->all());
        return redirect()->route('matriculas.index')->with('success', 'Matrículas alterada com sucesso.');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matricula $matricula)
    {
        try {
            $matricula->delete();
            return redirect()->route('matriculas.index')->with('success', 'Cadastro de Matrícula excluído com sucesso.');
        } catch (Exception $e) {
            return redirect()->route('matriculas.index')->with('danger', 'Não é possível excluir Matrícula. Há vínculos com outros registros.');
        }

    }


    private function geraMensalidade(Matricula $matricula)
    {
        $quantidadeMeses = $matricula->quantidade_meses;
        $valorMensalidade = $matricula->valor_mensalidade;
        $vencimentoPrimeira = $matricula->vencimento_primeira_parcela;
        $vencimento = $vencimentoPrimeira;
        for ($i = 1; $i <= $quantidadeMeses; $i++) {
            $dados = [
                'id_matricula' => $matricula->id,
                'numero' => $i,
                'valor' => $valorMensalidade,
                'vencimento' => $vencimento,
                'situacao' => Mensalidade::SITUACAO_NAO_PAGA,
            ];      
            Mensalidade::create($dados);      
            $vencimento = Carbon::parse($vencimento)->addMonth(1)->format('Y-m-d');
        }        
    }
}
