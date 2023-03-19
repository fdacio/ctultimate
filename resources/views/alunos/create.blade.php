@extends('layouts.app')
@section('title', 'alunos - Cadastrar')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Cadastrar Aluno</h2>
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
    {!! Form::open(['id' => 'form_alunos', 'class' => 'form', 'method' => 'post', 'route' => 'alunos.store']) !!}
    <div class="card-body">
        @include('alunos.form')
    </div>
    <div class="card-footer">
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
        <a class="btn btn-danger" href="{{ route('alunos.index') }}">Cancelar</a>
    </div>
    {!! Form::close() !!}
</div>
@endsection
