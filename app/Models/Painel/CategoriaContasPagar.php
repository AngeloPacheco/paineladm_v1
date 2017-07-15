<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class CategoriaContasPagar extends Model
{
    protected $table = "categoria_pagar_contas";
    protected $fillable = ['descricao'];   
}
