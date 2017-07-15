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
