<div class="form" id="form-dados-matriculas">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <small class="text-danger">*Campos obrigatórios.</small>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <label for="data">Data da Matrícula<small class="text-danger p-2">*</small></label>
                {!! Form::text('data', isset($matricula->data) ? \Carbon\Carbon::parse($matricula->data)->format('d/m/Y') : old('data'), ['class' => 'form-control data calendar', 'id' => 'data']) !!}
            </div>
        </div>
    </div>    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="id-aluno">Aluno<small class="text-danger p-2">*</small></label>
                {!! Form::select('id_aluno', $alunos, isset($matricula->id_aluno) ? $matricula->id_aluno : old('id_aluno'), ['placeholder' => 'Selecione', 'class' => 'form-control select', 'id' => 'id-aluno']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="id-categoria">Categoria<small class="text-danger p-2">*</small></label>
                {!! Form::select('id_categoria', $categorias, isset($matricula->id_categoria) ? $matricula->id_categoria : old('id_categoria'), ['placeholder' => 'Selecione', 'class' => 'form-control select', 'id' => 'id-categoria']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <label for="quantidade-meses">Quantidade de Meses<small class="text-danger p-2">*</small></label>
                {!! Form::text('quantidade_meses', isset($matricula->quantidade_meses) ? $matricula->quantidade_meses : old('quantidade_meses'), ['class' => 'form-control numero text-right', 'id' => 'quantidade-meses',  'readonly' => ((!empty($matricula)) ? true : false)]) !!}
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <label for="valor-mensalidade">Valor da Mensalidade<small class="text-danger p-2">*</small></label>
                {!! Form::text('valor_mensalidade', isset($matricula->valor_mensalidade) ? $matricula->valor_mensalidade : old('valor_mensalidade'), ['class' => 'form-control real text-right', 'id' => 'valor-mensalidade', 'readonly' => ((!empty($matricula)) ? true : false)]) !!}
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <label for="vencimento-primeira-parcela">Vencimento da Primeira Parcela<small class="text-danger p-2">*</small></label>
                {!! Form::text('vencimento_primeira_parcela', isset($matricula->vencimento_primeira_parcela) ? \Carbon\Carbon::parse($matricula->vencimento_primeira_parcela)->format('d/m/Y') : old('vencimento_primeira_parcela'), ['class' => 'form-control data calendar', 'id' => 'vencimento-primeira-parcela', 'readonly' => ((!empty($matricula)) ? true : false)]) !!}
            </div>
        </div>
    </div>
</div>