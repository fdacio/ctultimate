<p>{{ $matricula->id }}</p>
<p>{{ $matricula->aluno->nome }}</p>
<p>{{ $matricula->categoria->nome }}</p>
<p>{{ \Carbon\Carbon::parse($matricula->data)->format('d/m/Y')  }}</p>