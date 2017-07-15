<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Transportadora extends Model
{
    protected $fillable = [ 'id',
                            'razao_social',
                            'nome_fantasia', 
                            'cnpj',
                            'inscricao_estadual',
                            'logradouro',
                            'numero',
                            'complemento',
                            'bairro',
                            'localidade',
                            'cep',
                            'uf',
                            'email',
                            'celular',
                            'telefone',
                            'fax',
                            'contato'
                           ]; 
}
