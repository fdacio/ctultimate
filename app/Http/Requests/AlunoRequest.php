<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunoRequest extends FormRequest
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
        $rules = [         
            'nome' => 'required|string|max:60',
        ];

        return $rules;
    }

        /**
     * Get the messages rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nome.required' => 'Informe o Nome.',
            'nome.max' => 'Nome quantidade máxima de 60 caractéres',
        ];
    }
}
