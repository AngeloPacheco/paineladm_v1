@extends('painel.index')
@section('content')

<h1 class='painel-title'>Configurações do Sistema</h1>

<div class="lista-configs">
    
    <div class="row">
       <div class="col-md-4 col-sm-4 col-xs-12">
            <a class="links" href="{{url('painel/usuarios')}}" title='Usuários do sistemas'>  
                <div class="opcoes-configs">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <div class="titulo-configs">
                        <p class="painel-desc-configs">Usuários</p>
                    </div>
                </div>    
            </a>    
        </div>

        <div class="col-md-4 col-sm-4 col-xs-12">            
            <a class="links" href="{{url('painel/medidas')}}" title='Medidas dos Produtos'>  
                <div class="opcoes-configs">
                   <i class="fa fa-eyedropper" aria-hidden="true"></i>
                   <div class="titulo-configs">
                        <p class="painel-desc-configs">Medidas<p>
                   </div>
                </div>
            </a>
        </div>
    
        <div class="col-md-4 col-sm-4 col-xs-12">
            <a class="links" href="{{url('painel/categoria-produtos')}}" title='Categorias de Produtos'>  
               <div class="opcoes-configs">
                   <i class="fa fa-tags" aria-hidden="true" ></i>
                   <div class="titulo-configs">
                       <p class="painel-desc-configs">Categorias</p>
                    <p class="painel-desc-configs-2">de Produtos</p>
                   </div>
               </div>    
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12">
            <a class="links" href="{{url('painel/empresa')}}" title='Dados da Empresa'>  
                <div class="opcoes-configs">
                    <i class="fa fa-industry" aria-hidden="true"></i>
                    <div class="titulo-configs">
                        <p class="painel-desc-configs">Empresa<p>                   
                    </div>
                </div>    
            </a>
        </div>
  

        <div class="col-md-4 col-sm-4 col-xs-12">
             <a class="links" href="{{url('painel/transportadoras')}}" title='Transportadoras'>  
                <div class="opcoes-configs">
                    <i class="fa fa-truck" aria-hidden="true"></i>
                    <div class="titulo-configs">
                    <p class="painel-desc-configs">Transportadoras</p>
                </div>
            </div>    
            </a>
        </div>
    
        <div class="col-md-4 col-sm-4 col-xs-12">
            <a class="links" href="{{url('painel/forma-de-pagamentos')}}" title='Forma de Pagamentos'>  
                <div class="opcoes-configs">
                    <i class="fa fa-dollar" aria-hidden="true"></i>
                    <div class="titulo-configs">
                        <p class="painel-desc-configs">Forma de</p>
                        <p class="painel-desc-configs-2">Pagamentos</p>
                    </div>
                </div>   
            </a> 
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12">
            <a class="links" href="{{url('painel/categoria-contas-pagar')}}" title='Categorias contas a pagar'>  
                <div class="opcoes-configs">
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <div class="titulo-configs">
                        <p class="painel-desc-configs">Categorias</p>
                        <p class="painel-desc-configs-2">conta a pagar</p> 
                    </div>
                </div>    
            </a>
        </div>
    </div>
</div>
   
@endsection