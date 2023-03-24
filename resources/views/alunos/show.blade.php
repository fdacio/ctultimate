@extends('layouts.app')
@section('title', 'Alunos - Visualizar')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Visualizar Aluno</h2>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped table-hover table-responsive">
                <tr>
                    <th class="col-md-2">ID:</th>
                    <td>{{ $aluno->id }}</td>
                </tr>
                <tr>
                    <th>Nome</th>
                    <td>{{ $aluno->nome }}</td>
                </tr>
                <tr>
                    <th>Nascimento:</th>
                    <td>{{ (isset($aluno->nacimento)) ? \Carbon\Carbon::parse($aluno->nacimento)->format('d/m/Y') : '' }}</td>
                </tr>
                <tr>
                    <th>Sexo:</th>
                    <td>{{ ($aluno->sexo == 'M') ? 'Masculino' : 'Feminino' }}</td>
                </tr>
                <tr>
                    <th>Endereço:</th>
                    <td>{{ $aluno->endereco_completo }}</td>
                </tr>
                <tr>
                    <th>Telefone:</th>
                    <td>{{ $aluno->telefone }}</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>{{ $aluno->email }}</td>
                </tr>
                <tr>
                    <th>Responsável:</th>
                    <td>{{ $aluno->responsavel }}</td>
                </tr>                <tr>
                    <th>Parentesco:</th>
                    <td>{{ $aluno->parentesco }}</td>
                </tr>
                <tr>
                    <th>Criado:</th>
                    <td>{{ \Carbon\Carbon::parse($aluno->created_at)->format('d/m/Y H:i:s') }}</td>
                </tr>
                <tr>
                    <th>Alterado:</th>
                    <td>{{ \Carbon\Carbon::parse($aluno->updated_at)->format('d/m/Y H:i:s') }}</td>
                </tr>
            </table>
        </div>
        <div class="card-footer">
            <a href="{{ route('alunos.edit', $aluno->id) }}" class="btn btn-primary" title="Editar">Editar</a>
            <a class="btn btn-danger" href="{{ route('alunos.index') }}">Cancelar</a>
        </div>
    </div>
@endsection
