@extends('painel.index')
@section('content')

   
    @if ( isset($categoria))
        <div class="row painel-row">
            <div class="col-xs-12"> 
                <h1>Editar Categoria</h1>
                <form class="form-inline" method="post" action="{{route('categoria-produtos.update', $categoria->id)}}">    
                  {!! method_field('PUT') !!}
    
   @else
        <div class="row painel-row">
            <div class="col-xs-12"> 
                <h1>Nova Categoria de Produtos</h1>  
                <form class="form-inline" method="post" action="{{route('categoria-produtos.store')}}">    
    @endif
    
    
    @if (isset($errors) && count($errors) > 0)
        <div class="alert alert-danger">
             <p>Sistema Informa:</p>
             @foreach($errors->all() as $error)
                 <p>{{$error}}</p>
             @endforeach
         </div>
    @endif

    
            {!! csrf_field()!!} 
            <div class="form-group">
                <label class="painel-label">Descrição</label>        
               <input class="form-control" type='text' name="descricao" value="{{$categoria->descricao or old('descricao')}}" autofocus="" size=30>  
            </div>    
            
            <hr>
            
             <a href="{{url('painel/categoria-produtos')}}" class="btn btn-primary painel-btn" title="Lista todas categorias de produtos"> 
               <span class="fa fa-list"></span>
            </a>

            <button class="btn btn-primary painel-btn" title="Salvar"> <span class="fa fa-save"></span></button>
        </form> 
       </div>
    </div>    
 
 
 @endsection
