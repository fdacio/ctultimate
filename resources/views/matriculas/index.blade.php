@extends('layouts.app')
@section('title', 'Alunos')

@section('content')
<div class="card mb-2">
    <div class="card-header">
        <h3>Alunos</h3>
        @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
            {{ session('success') }}
        </div>
        @endif
    </div>
    <div class="card-body">
        <form action="{{ route('alunos.index') }}" method="get" class="form-filter">
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="nome">Nome</label>
                    <div class="input-group">
                        <input type="text" name="nome" id="nome" class="form-control" value="{{ request('nome') }}" />
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
            <a href="{{ route('alunos.create') }}" class="btn btn-primary"><i class="fa fa-plus mr-2"></i>Cadastrar</a>
        </div>
    </div>
</div>
<section class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Nascimento</th>
            <th>Telefone</th>
            <th style="width: 20%;"></th>
        </thead>
        <tbody>
            @if($alunos->total() == 0)
            <tr>
                <th class="text-center" colspan="5">Nenhum aluno encontrado</th>
            </tr>
            @else
            @foreach ($alunos as $aluno)
            <tr>
                <td>{{ $aluno->id }}</td>
                <td class="text-nowrap">{{ $aluno->nome }}</td>
                <td class="text-nowrap">{{ (isset($aluno->nascimento)) ? \Carbon\Carbon::parse($aluno->nascimento)->format('d/m/Y') : '' }}</td>
                <td class="text-nowrap">{{ $aluno->telefone }}</td>
                <td class="text-nowrap text-right">
                    <a href="{{ route('alunos.show', $aluno->id) }}" class="btn btn-info btn-sm" title="Visualizar"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('alunos.edit', $aluno->id) }}" class="btn btn-primary btn-sm" title="Editar"><i class="fa fa-pencil"></i></a>
                    @if($alunos->total() > 0)
                    {!! Form::open(['id' => 'form_excluir_' . $aluno->id, 'method' => 'delete', 'route' => ['alunos.destroy', $aluno->id], 'style'=>'display: inline']) !!}
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
    {{ $alunos->appends(request()->query())->links() }}
    <h6><b>{{ $alunos->total() }}</b> {{ $alunos->total() == 1 ? 'registro' : 'registros' }} no total</h6>
</section>
@endsection

@if($alunos->total() > 0)
@section('scripts')
{!! Html::script('js/modal-excluir.js') !!}
@endsection
@endif
