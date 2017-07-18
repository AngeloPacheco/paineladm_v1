<?php
/*===========================================================================

                                   VALIDAÇÕES
          
============================================================================*/

/* Validar se categoria de produtos já está cadastrada*/
function existeCategoriaProdutos($descricao){
  
  $query = DB::table('categoria_produtos')
           ->select('categoria_produtos.id')
           ->where('categoria_produtos.descricao', '=', $descricao)
           ->get();

  if (count($query) > 0){

    return true;
  
  }else{

    return false;
  }            
}

/* Validar se medida á está cadastrada*/
function existeMedida($descricao,$sigla){
  
  $query = DB::table('medidas')
           ->select('medidas.id')
           ->where('medidas.descricao', '=', $descricao)
           ->orwhere('medidas.sigla', '=', $sigla)
           ->get();

  if (count($query) > 0){

    return true;
  
  }else{

    return false;
  }            
}

/* Validar se existe CNPJ de transportadoras já cadastrado*/
function existeCNPJTransportadora($cnpj){
  
  $query = DB::table('transportadoras')
           ->select('transportadoras.id')
           ->where('transportadoras.cnpj', '=', $cnpj)
           ->get();

  if (count($query) > 0){

    return true;
  
  }else{

    return false;
  }            
}
/* Validar se existe categoria de contas a pagar cadastrada*/
function existeCategoriaContasPagar($descricao){
  
  $query = DB::table('categoria_pagar_contas')
           ->select('categoria_pagar_contas.id')
           ->where('categoria_pagar_contas.descricao', '=', $descricao)
           ->get();

  if (count($query) > 0){

    return true;
  
  }else{

    return false;
  }            
}

/* Validar se existe forma de pagamentos já está cadastrada*/
function existeFormaPagamento($descricao){
  
  $query = DB::table('forma_pagamentos')
           ->select('forma_pagamentos.id')
           ->where('forma_pagamentos.descricao', '=', $descricao)
           ->get();

  if (count($query) > 0){

    return true;
  
  }else{

    return false;
  }            
}

/* Validar se existe CNPJ de fornecedor já cadastrado*/
function existeCNPJFornecedor($cnpj){
  
  $query = DB::table('fornecedores')
           ->select('fornecedores.id')
           ->where('fornecedores.cnpj', '=', $cnpj)
           ->get();

  if (count($query) > 0){

    return true;
  
  }else{

    return false;
  }            
}

/* Validar se  produto já está cadastrado*/
function existeProduto($descricao){
  
  $query = DB::table('produtos')
           ->select('produtos.id')
           ->where('produtos.descricao', '=', $descricao)
           ->get();

  if (count($query) > 0){

    return true;
  
  }else{

    return false;
  }            
}