<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatriculaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_aluno' => 'required|integer',
            'id_categoria' => 'required|integer',
            'data' => 'required|date_format:d/m/Y',
            'quantidade_meses' => 'required|integer',
            'valor_mensalidade' => 'required|numeric|between:1.00,99999.99',
            'vencimento_primeira_parcela' => 'required|date_format:d/m/Y'
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'id_aluno.required' => 'Informe o Aluno',
            'id_categoria.required' => 'Informe a Categoria',
            'data.required' => 'Informe a Data da Matrícula',
            'data.date_format' => 'Data da Matrícula inválida',
            'quantidade_meses.required' => 'Informe a Quantidade de Meses',
            'quantidade_meses.integer' => 'Quantidade de Meses inválido.',
            'quantidade_meses.between' => 'Quantidade de Meses inválido.',
            'valor_mensalidade.numeric' => 'Valor da Mensalidade Inválido.',
            'valor_mensalidade.between' => 'Valor da Mensalidade inválido.',
            'vencimento_primeira_parcela.required' => 'Informe a Data do Vencimento da Primeira Mensalidade',
            'vencimento_primeira_parcela.date_format' => 'Data do Vencimento da Primeira Mensalidade inválida',
        ];
    }

    protected function prepareForValidation()
    {
        $valor = str_replace('R$', '', $this->valor_mensalidade);
        $valor = str_replace(' ', '', $valor);
        $valor = str_replace('.', '', $valor);
        $valor = str_replace(',', '.', $valor);

        $this->merge([
            'valor_mensalidade' => $valor
        ]);
    }
}
