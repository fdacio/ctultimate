@extends('layouts.app')
@section('title', 'Usuários - Visualizar')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="pull-left">
            <h3>Perfil de Usuário</h3>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('home') }}">Voltar</a>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-striped table-hover">
            <tr>
                <th style="width:10%">ID:</th>
                <td>{{ $usuario->id }}</td>
            </tr>
            <tr>
                <th>Nome:</th>
                <td>{{ $usuario->nome }}</td>
            </tr>
            <tr>
                <th>Email:</th>
                <td>{{ $usuario->email }}</td>
            </tr>
            <tr>
                <th>Tipo:</th>
                <td>{{ $usuario->tipo->nome }}</td>
            </tr>
            <tr>
                <th>Organização:</th>
                <td>{{ $usuario->organizacao->nome }}</td>
            </tr>
            <tr>
                <th>Almoxarifado:</th>
                <td>{{ $usuario->almoxarifado->nome }}</td>
            </tr>            
            <tr>
                <th>Departamentos:</th>
                <td> @foreach ($usuario->departamentos as $departamento)
                    {{ $departamento->nome }}<br>
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>Cadastro:</th>
                <td>{{ \Carbon\Carbon::parse($usuario->criado)->format('d/m/Y') }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection
