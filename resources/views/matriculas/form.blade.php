<div class="form card card-body" id="form-dados-matriculas>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <small class="text-danger">*Campos obrigatórios.</small>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <label for="data">Data da Matrícula</label>
                {!! Form::text('data', isset($matricula->data) ? \Carbon\Carbon::parse($matricula->data)->format('d/m/Y') : null, ['class' => 'form-control data', 'id' => 'data']) !!}
            </div>
        </div>
    </div>    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="id-aluno">Aluno<small class="text-danger p-2">*</small></label>
                {!! Form::select('id_aluno', $matriculas, isset($matricula->id_aluno) ? $matricula->id_aluno : old('id_aluno'), ['class' => 'form-control select', 'id' => 'id-aluno']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="id-categoria">Categoria<small class="text-danger p-2">*</small></label>
                {!! Form::select('id_categoria', $categorias, isset($matricula->id_categoria) ? $matricula->id_categoria : old('id_categoria'), ['class' => 'form-control select', 'id' => 'id-categoria']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <label for="quantidade-meses">Quantidade de Meses</label>
                {!! Form::text('quantidade_meses', isset($matricula->quantidade_meses) ? $matricula->quantidade_meses : old('quantidade_meses'), ['placeholder' => 'Selecione', 'class' => 'form-control numero text-right', 'id' => 'quantidade-meses']) !!}
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <label for="valor-mensalidade">Valor da Mensalidade</label>
                {!! Form::text('valor_mensalidade', isset($matricula->vencimento_primeira_parcela) ? $matricula->vencimento_primeira_parcela : old('vencimento_primeira_parcela'), ['class' => 'form-control real text-right', 'id' => 'vencimento-primeira-parcela']) !!}
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <label for="vencimento-primeira-parcela">Vencimento da Primeira Parcela</label>
                {!! Form::text('numero', isset($matricula->vencimento_primeira_parcela) ? $matricula->vencimento_primeira_parcela : old('vencimento_primeira_parcela'), ['class' => 'form-control data calendar', 'id' => 'vencimento-primeira-parcela', 'id' => 'numero']) !!}
            </div>
        </div>
    </div>
</div>