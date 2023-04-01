@extends('layouts.app')
@section('title', 'Matrículas')

@section('content')
<div class="card mb-2">
    <div class="card-header">
        <h3>Matrículas</h3>
        @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
            {{ session('success') }}
        </div>
        @endif
    </div>
    <div class="card-body">
        <form action="{{ route('matriculas.index') }}" method="get" class="form-filter">
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="matricula">Nome do Aluno</label>
                    <div class="input-group">
                        <input type="text" name="matricula" id="matricula" class="form-control" value="{{ request('matricula') }}" />
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
            <a href="{{ route('matriculas.create') }}" class="btn btn-primary"><i class="fa fa-plus mr-2"></i>Cadastrar</a>
        </div>
    </div>
</div>
<section class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <th>Nº Matrícula</th>
            <th>Aluno</th>
            <th>Categoria</th>
            <th>Data</th>
            <th style="width: 20%;"></th>
        </thead>
        <tbody>
            @if($matriculas->total() == 0)
            <tr>
                <th class="text-center" colspan="5">Nenhuma matrícula encontrado</th>
            </tr>
            @else
            @foreach ($matriculas as $matricula)
            <tr>
                <td>{{ $matricula->id }}</td>
                <td class="text-nowrap">{{ $matricula->aluno->nome }}</td>
                <td class="text-nowrap">{{ $matricula->categoria->nome }}</td>
                <td class="text-nowrap">{{ \Carbon\Carbon::parse($aluno->nascimento)->format('d/m/Y') }}</td>
                <td class="text-nowrap text-right">
                    <a href="{{ route('matriculas.show', $matricula->id) }}" class="btn btn-info btn-sm" title="Visualizar"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('matriculas.edit', $matricula->id) }}" class="btn btn-primary btn-sm" title="Editar"><i class="fa fa-pencil"></i></a>
                    @if($matriculas->total() > 0)
                    {!! Form::open(['id' => 'form_excluir_' . $matricula->id, 'method' => 'delete', 'route' => ['matriculas.destroy', $matricula->id], 'style'=>'display: inline']) !!}
                    {!! Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger btn-sm modal-excluir']) !!}
                    {!! Form::close() !!}
                    @endif
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</section>

<section class="text-center">
    {{ $matriculas->appends(request()->query())->links() }}
    <h6><b>{{ $matriculas->total() }}</b> {{ $matriculas->total() == 1 ? 'registro' : 'registros' }} no total</h6>
</section>
@endsection

@if($matriculas->total() > 0)
@section('scripts')
{!! Html::script('js/modal-excluir.js') !!}
@endsection
@endif
