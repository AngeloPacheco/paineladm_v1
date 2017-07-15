@extends('painel.index')
@section('content')

    
    @if ( isset($medida))
        <div class="row painel-row">
            <div class="col-xs-12"> 
                <h1>Editar Medida</h1>
                <form class="form-inline" method="post" action="{{route('medidas.update', $medida->id)}}">    
                {!! method_field('PUT') !!}
   @else
        <div class="row painel-row">
            <div class="col-xs-12"> 
                <h1>Nova Medida</h1>
                <form class="form-inline" method="post" action="{{route('medidas.store')}}">    
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
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="painel-label">Descrição</label>        
                               <input class="form-control " type='text' size=50 name="descricao" value="{{$medida->descricao or old('descricao')}}" autofocus="">  
                            </div>    
                            
                            <div class="form-group">
                                <label class="painel-label">Sigla</label>        
                               <input class="form-control " type='text' name="sigla" size=10 value="{{$medida->sigla or old('sigla')}}"  style="text-transform:uppercase">  
                            </div>    
                         </div>
                    </div>

                    <a href="{{url('painel/medidas')}}" class="btn btn-primary painel-btn" title="Listar todas medidas"><span class="fa fa-list"></span>
                    </a>
                    <button class="btn btn-primary painel-btn" title="Salvar"> <span class="fa fa-save"></span></button>
                </form>
            </div>
        </div>
@endsection    