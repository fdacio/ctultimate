@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card card-default">
                <div class="card-header bg-primary">
                    <img src="{{ asset('img/logo-sistema-cotacao-navbar.png') }}" alt="logo" width="150">
                </div>
                <div class="card-body text-center">
                    Bem vindo <b>{{ Auth::user()->name }}</b>
                </div>
                <p>
                    Qual é o tamanho e o tipo de fonte nas normas da ABNT?

                    Tipo de Fonte: Arial ou Times New Roman
                    Tamanho da fonte: 12
                    Tamanho da fonte em textos especiais: 10
                    Qual deve ser o alinhamento do texto nas normas da ABNT?

                    O alinhamento deve ser justificado, exceto para referências bibliográficas.
                    Qual é a regra geral de espaçamento entre linhas nas normas da ABNT?

                    Em relação ao espaçamento, a NBR 14724 estabelece que, de forma geral, deve-se deixar espaçamento de 1,5
                    cm entre as linhas.
                    Quais as exceções de espaçamento de 1,5 cm nas normas da ABNT?

                    - Citações de mais de três linhas
                    - Notas de rodapé
                    - Legendas de ilustrações e de tabelas
                    - Na descrição da folha de rosto e folha de aprovação
                    - Referências bibliográficas
                    Qual é o espaçamento entre as seções, subseções e os textos?

                    Entre as seções, subseções e seus textos, deve-se utilizar um espaço de um ENTER de 1,5cm antes do texto
                    da seção e um depois do texto.

                    Qual é o tamanho e o tipo de fonte nas normas da ABNT?

                    Tipo de Fonte: Arial ou Times New Roman
                    Tamanho da fonte: 12
                    Tamanho da fonte em textos especiais: 10
                    Qual deve ser o alinhamento do texto nas normas da ABNT?

                    O alinhamento deve ser justificado, exceto para referências bibliográficas.
                    Qual é a regra geral de espaçamento entre linhas nas normas da ABNT?

                    Em relação ao espaçamento, a NBR 14724 estabelece que, de forma geral, deve-se deixar espaçamento de 1,5
                    cm entre as linhas.
                    Quais as exceções de espaçamento de 1,5 cm nas normas da ABNT?

                    - Citações de mais de três linhas
                    - Notas de rodapé
                    - Legendas de ilustrações e de tabelas
                    - Na descrição da folha de rosto e folha de aprovação
                    - Referências bibliográficas
                    Qual é o espaçamento entre as seções, subseções e os textos?

                    Entre as seções, subseções e seus textos, deve-se utilizar um espaço de um ENTER de 1,5cm antes do texto
                    da seção e um depois do texto.





                </p>
            </div>
        </div>
    </div>
@endsection
