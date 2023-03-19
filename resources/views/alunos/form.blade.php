<div class="form card card-body" id="form-dados-alunos">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <small class="text-danger">*Campos obrigatórios.</small>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="nome">Nome<small class="text-danger p-2">*</small></label>
                {!! Form::text('nome', isset($aluno) ? $aluno->nome : null, ['class' => 'form-control', 'id' => 'nome']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <label for="nascimento">Nascimento</label>
                {!! Form::text('nascimento', isset($aluno) ? \Carbon\Carbon::parse($aluno->nascimento)->format('d/m/Y') : null, ['class' => 'form-control data', 'id' => 'nascimento']) !!}
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <label for="sexo">Sexo</label>
                {!! Form::select('sexo', ['M' => 'Masculino', 'F' => 'Feminino'], isset($aluno) ? $aluno->sexo : old('sexo'), ['placeholder' => 'Selecione', 'class' => 'form-control', 'id' => 'sexo']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <label for="logradouro">Logradouro</label>
                {!! Form::text('logradouro', isset($aluno) ? $aluno->logradouro : null, ['class' => 'form-control', 'id' => 'logradouro', 'id' => 'logradouro']) !!}
            </div>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2">
            <div class="form-group">
                <label for="numero">Número</label>
                {!! Form::text('numero', isset($aluno) ? $aluno->numero : null, ['class' => 'form-control', 'id' => 'numero', 'id' => 'numero']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <label for="complemento">Complemento</label>
                {!! Form::text('complemento', isset($aluno) ? $aluno->complemento : null, ['class' => 'form-control', 'id' => 'complemento']) !!}
            </div>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <label for="bairro">Bairro</label>
                {!! Form::text('bairro', isset($aluno) ? $aluno->bairro : null, ['class' => 'form-control', 'id' => 'bairro']) !!}
            </div>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2">
            <div class="form-group">
                <label for="cep">CEP</label>
                {!! Form::text('cep', isset($aluno) ? $aluno->cep : null, ['class' => 'form-control cep', 'id' => 'cep']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <label for="cidade">Cidade</label>
                {!! Form::text('cidade', isset($aluno->cidade) ? $aluno->cidade : old('cidade'), ['class' => 'form-control', 'id' => 'cidade']) !!}
            </div>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2">
            <div class="form-group">
                <label for="uf">UF</label>
                {!! Form::text('uf', isset($aluno->uf) ? $aluno->uf : old('uf'), ['class' => 'form-control', 'id' => 'uf', 'maxlength' => 2]) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <label for="telefone">Telefone</label>
                {!! Form::tel('telefone', isset($aluno) ? $aluno->telefone : null, ['class' => 'form-control telefone', 'id' => 'telefone']) !!}
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="form-group">
                <label for="email">E-mail</label>
                {!! Form::email('email', isset($aluno) ? $aluno->email : null, ['class' => 'form-control', 'id' => 'email']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="form-group">
                <label for="responsavel">Responsável</label>
                {!! Form::email('responsavel', isset($aluno) ? $aluno->responsavel : null, ['class' => 'form-control', 'id' => 'responsavel']) !!}
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <label for="parentesco">Parentesco</label>
                {!! Form::email('parentesco', isset($aluno) ? $aluno->parentesco : null, ['class' => 'form-control', 'id' => 'parentesco']) !!}
            </div>
        </div>
    </div>
</div>