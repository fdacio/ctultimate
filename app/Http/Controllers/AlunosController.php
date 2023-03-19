<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Http\Requests\AlunoRequest;
use Exception;
use Illuminate\Http\Request;

class AlunosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = Aluno::orderBy('nome', 'asc');
        $nome = request()->get('nome');
        if (!empty($nome)) {
            $alunos =  $alunos->where('nome', 'LIKE', '%' . $nome . '%');
        }
        $alunos = $alunos->paginate(10);
        return view('alunos.index', compact('alunos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alunos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlunoRequest $request)
    {
        Aluno::create($request->all());
        return redirect()->route('alunos.index')->with('success', 'Aluno cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Aluno $aluno)
    {
        return view('alunos.show', compact('aluno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Aluno $aluno)
    {
        return view('alunos.edit', compact('aluno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlunoRequest $request, Aluno $aluno)
    {
        $aluno->update($request->all());
        return redirect()->route('alunos.index')->with('success', 'Cadastro de aluno alterado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aluno $aluno)
    {
        try {
            $aluno->delete();
            return redirect()->route('alunos.index')->with('success', 'Cadastro de aluno excluído com sucesso.');
        } catch (Exception $e) {
            return redirect()->route('alunos.index')->with('danger', 'Não é possível excluir aluno. Há vínculos');
        }
    }
}
