@extends('layouts.app')
@section('title', 'Mensalidade - Baixa')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Baixa de Mensalidade</h2>
        @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissable ''">
            <button type="button" class="close" data-dismiss="alert" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
            <strong>Ops!</strong> Verifique os erros.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(session('danger'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
            {{ session('danger') }}
        </div>
        @endif
    </div>
    {!! Form::open(['id' => 'form_baixa_mensalidade', 'class' => 'form', 'method' => 'put', 'route' => ['mensalidades.baixa.store', $mensalidade->id]]) !!}
    <div class="card-body">
        <div class="form" id="form-dados-mensalidades">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="aluno">Aluno</label>
                        {!! Form::text('aluno', $matricula->descricao_matricula, ['class' => 'form-control', 'id' => 'aluno', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>        
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label for="numero">Número</label>
                        {!! Form::text('numero', $mensalidade->numero, ['class' => 'form-control text-right', 'id' => 'numero', 'disabled' => true]) !!}
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label for="vencimento">Vencimento</label>
                        {!! Form::text('vencimento', \Carbon\Carbon::parse($mensalidade->vencimento)->format('d/m/Y'), ['class' => 'form-control', 'id' => 'vencimento', 'disabled' => true]) !!}
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label for="valor">Valor</label>
                        {!! Form::text('valor', 'R$ ' . number_format($mensalidade->valor, 2, ',', '.'), ['class' => 'form-control text-right', 'id' => 'valor', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>    
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="data-pagamento">Data do Pagamento</label>
                        {!! Form::text('data_pagamento', old('data_pagamento'), ['class' => 'form-control data calendar', 'id' => 'data-pagamento']) !!}
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="valor-pago">Valor Pago</label>
                        {!! Form::text('valor_pago', old('valor_pago'), ['class' => 'form-control real text-right', 'id' => 'valor-pago']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        {!! Form::submit('Baixar', ['class' => 'btn btn-primary']) !!}
        <a class="btn btn-danger" href="{{ route('mensalidades.index', $mensalidade->id_mensalidade) }}">Cancelar</a>
    </div>
    {!! Form::close() !!}
</div>
@endsection
