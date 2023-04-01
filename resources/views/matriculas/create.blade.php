@extends('layouts.app')
@section('title', 'Matrículas - Cadastrar')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Cadastrar Matrícula</h2>
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
    {!! Form::open(['id' => 'form_matriculas', 'class' => 'form', 'method' => 'post', 'route' => 'matriculas.store']) !!}
    <div class="card-body">
        @include('matriculas.form')
    </div>
    <div class="card-footer">
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
        <a class="btn btn-danger" href="{{ route('matriculas.index') }}">Cancelar</a>
    </div>
    {!! Form::close() !!}
</div>
@endsection
