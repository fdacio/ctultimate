@extends('layouts.app')
@section('title', 'Mensalidades')

@section('content')
<div class="card mb-2">
    <div class="card-header">
        <h3>Mensalidades</h3>
        @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
            {{ session('success') }}
        </div>
        @endif
        @if(session('danger'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
            {{ session('danger') }}
        </div>
        @endif
    </div>
    <div class="card-body">
        <form action="{{ route('mensalidades.index') }}" method="get" class="form-filter">
            <div class="row">
                <div class="col-md-10 col-lg-10 col-sm-12">
                    <div class="form-group">
                        <label for="id-matricula">Aluno</label>
                        {{ Form::select('id_matricula', $matriculas, request('id_matricula'), ['placeholder' => 'Selecione', 'class' => 'form-control select', 'id' => 'id-matricula']) }}
                    </div>
                </div>
                <div class="col-md-2 col-lg-2 col-sm-12">
                    <div class="form-group">
                        <label>&nbsp</label>
                        <button class="form-control btn btn-success"><i class="fa fa-search mr-2"></i><span>Pesquisar</span></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@if(request('id_matricula'))
<div class="card mb-2">
    <div class="card-header">
        <h4>Aluno: {{ $matricula->descricao_matricula }}</h4>
    </div>
</div>            
<section class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <th class="col-md-1">Nº </th>
            <th class="col-md-2">Vencimento</th>
            <th class="col-md-2 text-right">Valor</th>
            <th class="col-md-2">Situação</th>
            <th class="col-md-3">Observação</th>
            <th class="col-md-2"></th>
        </thead>
        <tbody>
            @if($mensalidades->count() == 0)
            <tr>
                <th class="text-center" colspan="7">Nenhuma mensalidade encontrado</th>
            </tr>
            @else
            @foreach ($mensalidades as $mensalidade)
            <tr>
                <td>{{ $mensalidade->numero}}</td>
                <td class="text-nowrap">{{ \Carbon\Carbon::parse($mensalidade->data)->format('d/m/Y') }}</td>
                <td class="text-nowrap text-right">{{ 'R$ ' .number_format($mensalidade->valor, 2, ',', '.') }}</td>
                <td class="text-nowrap {{ $mensalidade->situacao_cor }}">{{ $mensalidade->situacao_mensalidade }} {{ (!empty($mensalidade->data_pagamento)) ? '(' . \Carbon\Carbon::parse($mensalidade->data_pagamento)->format('d/m/Y') . ')' : '' }}</td>
                <td class="text-nowrap">{{ $mensalidade->observacao }}</td>
                
                <td class="text-nowrap text-right">
                    @if($mensalidade->situacao == App\Mensalidade::SITUACAO_NAO_PAGA)
                        <a href="{{ route('mensalidades.baixa', $mensalidade->id) }}" class="btn btn-success btn-sm" title="Baixar"><span class="fa fa-dollar p-1"></span></a>
                    @else
                        {!! Form::open(['id' => 'form_estorna_baixa_' . $mensalidade->id, 'method' => 'delete', 'route' => ['mensalidades.baixa.estorna', $mensalidade->id], 'style'=>'display: inline']) !!}
                        {!! Form::button('<i class="fa fa-dollar p-1"></i>', ['type' => 'button', 'class' => 'btn btn-danger btn-sm modal-estornar', 'title' => 'Estornar Baixa']) !!}
                        {!! Form::close() !!}
                    @endif
                    <a href="{{ route('mensalidades.show', $mensalidade->id) }}" class="btn btn-info btn-sm" title="Visualizar"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('mensalidades.edit', $mensalidade->id) }}" class="btn btn-primary btn-sm" title="Editar"><i class="fa fa-pencil"></i></a>                    

                    @if($mensalidade->situacao == App\Mensalidade::SITUACAO_CANCELADA)
                        {!! Form::open(['id' => 'form_reativa_' . $mensalidade->id, 'method' => 'put', 'route' => ['mensalidades.reativa', $mensalidade->id], 'style'=>'display: inline']) !!}
                        {!! Form::button('<i class="fa fa-check-square-o"></i>', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm', 'title' => 'Reativar']) !!}
                        {!! Form::close() !!}
                    @else
                        {!! Form::open(['id' => 'form_cancela_' . $mensalidade->id, 'method' => 'delete', 'route' => ['mensalidades.cancela', $mensalidade->id], 'style'=>'display: inline']) !!}
                        {!! Form::button('<i class="fa fa-remove"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title' => 'Cancelar']) !!}
                        {!! Form::close() !!}
                    @endif
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</section>
@endif
@endsection
@section('scripts')
{!! Html::script('js/modal-estornar.js') !!}
@endsection
