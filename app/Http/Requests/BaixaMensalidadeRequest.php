<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaixaMensalidadeRequest extends FormRequest
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
            'data_pagamento' => 'required|date_format:d/m/Y',
            'valor_pago' => 'required|numeric|between:1.00,99999.99'            
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
            'data_pagamento.required' => 'Informe a Data do Pagamento',
            'data_pagamento.date_format' => 'Data do Pagamento inválida',
            'valor_pago.required' => 'Informe o Valor Pago.',
            'valor_pago.numeric' => 'Valor Pago Inválido.',
            'valor_pago.between' => 'Valor Pago inválido.',
        ];
    }

    protected function prepareForValidation()
    {
        $valor = str_replace('R$', '', $this->valor_pago);
        $valor = str_replace(' ', '', $valor);
        $valor = str_replace('.', '', $valor);
        $valor = str_replace(',', '.', $valor);

        $this->merge([
            'valor_pago' => $valor
        ]);
    }
}
