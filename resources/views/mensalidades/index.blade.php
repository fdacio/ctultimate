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
                <div class="form-group col-md-12">
                    <label for="id-mensalidade">Aluno</label>
                    <div class="input-group">
                        {{ Form::select($mensalidades, old('id_mensalidade'), ['placeholder' => 'Selecione', 'class' => 'form-control select', 'id' => 'id-mensalidade']) }}
                        <div class="input-group-append">
                            <button class="btn btn-success"><i class="fa fa-search mr-2"></i><span>Pesquisar</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer">
        <div class="text-right mb-2">
            <a href="{{ route('mensalidades.create') }}" class="btn btn-primary"><i class="fa fa-plus mr-2"></i>Cadastrar</a>
        </div>
    </div>
</div>
<section class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <th>Nº </th>
            <th>Vencimento</th>
            <th>Valor</th>
            <th>Situação</th>
            <th>Observação</th>
            <th style="width: 20%;"></th>
        </thead>
        <tbody>
            @if($mensalidades->total() == 0)
            <tr>
                <th class="text-center" colspan="7">Nenhuma mensalidade encontrado</th>
            </tr>
            @else
            @foreach ($mensalidades as $mensalidade)
            <tr>
                <td>{{ $mensalidade->numero}}</td>
                <td class="text-nowrap">{{ \Carbon\Carbon::parse($mensalidade->data)->format('d/m/Y') }}</td>
                <td class="text-nowrap">{{ number_format($mensalidade->valor, 2, ',', '.') }}</td>
                <td class="text-nowrap">{{ $mensalidade->situacao_mensalidade }}</td>
                <td class="text-nowrap">{{ $mensalidade->observacao }}</td>
                
                <td class="text-nowrap text-right">
                    <a href="{{ route('mensalidades.show', $mensalidade->id) }}" class="btn btn-info btn-sm" title="Visualizar"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('mensalidades.edit', $mensalidade->id) }}" class="btn btn-primary btn-sm" title="Editar"><i class="fa fa-pencil"></i></a>
                    <a href="{{ route('mensalidades.baixa', $mensalidade->id) }}" class="btn btn-success btn-sm" title="Baixar"><i class="fa fa-check"></i></a>
                    <a href="{{ route('mensalidades.cancela', $mensalidade->id) }}" class="btn btn-danger btn-sm" title="Cancelar"><i class="fa fa-check"></i></a>
                    <a href="{{ route('mensalidades.reativa', $mensalidade->id) }}" class="btn btn-danger btn-sm" title="Cancelar"><i class="fa fa-check"></i></a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</section>

<section class="text-center">
    {{ $mensalidades->appends(request()->query())->links() }}
    <h6><b>{{ $mensalidades->total() }}</b> {{ $mensalidades->total() == 1 ? 'registro' : 'registros' }} no total</h6>
</section>
@endsection

@if($mensalidades->total() > 0)
@section('scripts')
{!! Html::script('js/modal-excluir.js') !!}
@endsection
@endif
