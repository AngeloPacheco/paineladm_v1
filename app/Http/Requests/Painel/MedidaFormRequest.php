<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class MedidaFormRequest extends FormRequest
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
            'descricao' => 'required',
            'sigla' => 'required',
        ];
    }
    
    public function messages() {
        
         return [
            'descricao.required' => 'Inserir a descrição da medida.',
            'sigla.required' => 'Inserir a sigla da medida.',
        ];
    }
}
