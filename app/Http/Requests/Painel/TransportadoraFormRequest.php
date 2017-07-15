<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class TransportadoraFormRequest extends FormRequest
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
                'razao_social'  => 'required',
                'nome_fantasia' => 'required',
                'cnpj'          => 'required',
                'cep'           => 'required',
                'logradouro'    => 'required',
                'bairro'        => 'required',
                'localidade'    => 'required',
                'uf'            => 'required',
           ];
    } 
    
    public function messages() {
        
            return [
                'razao_social.required'  => 'Insira a Razão Social',
                'nome_fantasia.required' => 'Insira o Nome Fantasia',
                'cnpj.required'          => 'Insira o CNPJ',
                'logradouro.required'    => 'Insira o logradouro',
                'bairro.required'        => 'Insira o bairro',
                'localidade.required'    => 'Insira a cidade',
                'uf.required'            => 'Insira o estado',
            ];
    }
}
