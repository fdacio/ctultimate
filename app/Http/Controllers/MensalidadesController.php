<?php

namespace App\Http\Controllers;

use App\Http\Requests\BaixaMensalidadeRequest;
use App\Matricula;
use App\Mensalidade;
use Carbon\Carbon;
use Exception;
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
        $matricula = new Collection([]);
        $idMatricula = request()->get('id_matricula');
        if (!empty($idMatricula)) {
            $mensalidades = Mensalidade::where('id_matricula', $idMatricula)->orderBy('numero', 'asc')->get();
            $matricula = Matricula::find($idMatricula);
        }
        return view('mensalidades.index', compact('matriculas', 'mensalidades', 'matricula'));
    }


    public function baixa(Mensalidade $mensalidade)
    {
        $matricula = Matricula::find($mensalidade->id_matricula);
        return view('mensalidades.baixa', compact('mensalidade', 'matricula'));
    }

    public function storeBaixa(BaixaMensalidadeRequest $request, Mensalidade $mensalidade)
    {
        $valorPago = (float) $request->get('valor_pago');
        $dataPagamento = $request->get('data_pagamento');
        $dataPagamento = Carbon::createFromFormat('d/m/Y', $dataPagamento)->toDateString();

        $mensalidade->situacao = ($valorPago < $mensalidade->valor) ? Mensalidade::SITUACAO_POR_CONTA : Mensalidade::SITUACAO_PAGA;
        $mensalidade->observacao = ($valorPago < $mensalidade->valor) ? 'Valor de R$ ' . number_format($valorPago, 2, ',', '.') . ' pago por conta' : 'Valor pago integralmente.';
        $mensalidade->valor_pago = $valorPago;
        $mensalidade->data_pagamento = $dataPagamento;
        $mensalidade->update();

        return redirect()->route('mensalidades.index', ['id_matricula' => $mensalidade->id_matricula])->with('success', 'Baixa de mensalidade realizada sucesso.');
    }

    public function estornaBaixa(Mensalidade $mensalidade)
    {
        $mensalidade->situacao = Mensalidade::SITUACAO_NAO_PAGA;
        $mensalidade->valor_pago = null;
        $mensalidade->data_pagamento = null;
        $mensalidade->observacao = null;
        $mensalidade->update();
        return redirect()->route('mensalidades.index', ['id_matricula' => $mensalidade->id_matricula])->with('success', 'Estorno de baixa de mensalidade realizada sucesso.');
    }

    public function show(Mensalidade $mensalidade)
    {
        return view('mensalidades.show', compact('mensalidade'));
    }

    public function edit(Mensalidade $mensalidade)
    {
        return view('mensalidades.edit', compact('mensalidade'));
    }


    public function cancela(Mensalidade $mensalidade)
    {
        try {
            if ($mensalidade->situacao != Mensalidade::SITUACAO_NAO_PAGA) {
                throw new Exception('Mensalidade tem pagamento');
            }
            $mensalidade->situacao = Mensalidade::SITUACAO_CANCELADA;
            $mensalidade->update();
            return redirect()->route('mensalidades.index', ['id_matricula' => $mensalidade->id_matricula])->with('success', 'Mensalidade cancelada com sucesso.');
        } catch (Exception $e) {
            return redirect()->route('mensalidades.index', ['id_matricula' => $mensalidade->id_matricula])->with('danger', 'Não foi possível cancelar mensalidade. ' . $e->getMessage());
        }
    }

    public function reativa(Mensalidade $mensalidade)
    {
        $mensalidade->situacao = Mensalidade::SITUACAO_NAO_PAGA;
        $mensalidade->update();
        return redirect()->route('mensalidades.index', ['id_matricula' => $mensalidade->id_matricula])->with('success', 'Mensalidade reativada com sucesso.');
    }
}
