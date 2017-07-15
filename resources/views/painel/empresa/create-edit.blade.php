@extends('painel.index')
@section('content')

    @if ( isset($empresa))
        
        <h1 class='painel-title'>Editar Empresa</h1>
        
        <div class="row painel-row">
            <div class="col-xs-12"> 
          
                <form class="form-inline" method="post" action="{{route('empresa.update', $empresa->id)}}" enctype="multipart/form-data">    
                {!! method_field('PUT') !!}
   @else
        
        <h1 class='painel-title'>Empresa</h1>
        <div class="row painel-row">
            <div class="col-xs-12"> 
                <form class="form-inline" method="post" action="{{route('empresa.store')}}" enctype="multipart/form-data">    
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
                    <div class="panel panel-default painel-panel-logomarca">
                        <div class='panel-heading'>Logomarca</div>        
                            <div class='panel-body'>

                                @if ( isset ($nm_imagem))
            
                                    <div class="rendereiza_logomarca"  id="logomarca">
                                       <img class="img-thumbnail" src="{{url('storage/img-empresa') . '/' . $nm_imagem}}">      
                                    </div>
                                    <hr>
                                    <input class='hide' id="imagem" type="file" name="photos[]" multiple />
                                    <label for='imagem' class='btn btn-primary'>Selecionar</label>                        
            
                                @else              
            
                                    <div class="rendereiza_logomarca"  id="logomarca"></div>
                                    <hr>
                                    <input class='hide' id="imagem" type="file" name="photos[]" multiple />
                                    <label for='imagem' class='btn btn-primary painel-btn'>Selecionar</label>

                                @endif     
                            </div>    
                    </div>     
                           
                    <div class="panel panel-default">
                        <div class='panel-body'>

                            <div class="form-group painel-input">
                                <label class="painel-label">Razão Social</label>
                                <input size="43" class="form-control" type='text' name="razao_social" value="{{$empresa->razao_social or old('razao_social')}}" autofocus="">  
                            </div>

                            <div class="form-group painel-input">
                                <label class="painel-label">Nome Fantasia</label>
                                 <input size="43" class="form-control" type='text' name="nome_fantasia" value="{{$empresa->nome_fantasia or old('nome_fantasia')}}">  
                            </div>
                             
                            <div class="form-group painel-input">
                                <label class="painel-label">CNPJ</label>
                                <input size="16" class="form-control" type='text' id='cnpj' name="cnpj" value="{{$empresa->cnpj or old('cnpj')}}">  
                            </div>

                            <div class="form-group painel-input">
                                    <label class="painel-label">Inscrição Estadual</label>
                                    <input size="16" class="form-control" type='text' name="inscricao_estadual" value="{{$empresa->inscricao_estadual or old('inscricao_estadual')}}">  
                           </div>

                            <div class="form-group painel-input">
                                <label class="painel-label">Responsável</label>
                                <input size="25" class="form-control" type='text' name="responsavel" value="{{$empresa->responsavel or old('responsavel')}}">  
                            </div>
                            
                        </div>        
                    </div>
                        
                    <div class="panel panel-default">
                        <div class='panel-body'>
                        
                            <div class="form-group painel-input">
                                <label class="painel-label">CEP</label>
                                <input size="15" class="form-control" type='text' id='cep' name="cep" value="{{$empresa->cep or old('cep')}}">  
                            </div>                           
 
                            <div class="form-group painel-input">
                                <label class="painel-label">Logradouro</label>
                                <input size="50" class="form-control" type='text' id="logradouro"  name="logradouro" value="{{$empresa->logradouro or old('logradouro')}}">  
                             </div>
                             
                            <div class="form-group painel-input">
                                <label class="painel-label">Número</label>
                                <input size="10" class="form-control" type='text' name="numero" value="{{$empresa->numero or old('numero')}}">  
                             </div>
                             
                            <div class="form-group painel-input">
                                <label class="painel-label">Complemento</label>
                                <input size="15" class="form-control" type='text' name="complemento" value="{{$empresa->complemento or old('complemento')}}">  
                             </div>
                             
                            <div class="form-group painel-input">
                                <label class="painel-label">Bairro</label>
                                <input size="25" class="form-control" type='text' id='bairro' name="bairro" value="{{$empresa->bairro or old('bairro')}}">  
                            </div>
                             
                            <div class="form-group painel-input">
                                <label class="painel-label">Cidade</label>
                                <input size="14" class="form-control" type='text'  id='localidade' name="localidade" value="{{$empresa->cidade or old('cidade')}}">  
                            </div>

                             <div class="form-group painel-input">
                                <label class="painel-label">Estado</label>
                                <input size="5" class="form-control" type='text' id='uf' name="uf" value="{{$empresa->uf or old('uf')}}">  
                            </div>
                        </div>    
                    </div>    
                    
                    <div class="panel panel-default">
                        <div class='panel-body'>
                            
                            <div class="form-group painel-input">
                                <label class="painel-label">E-mail</label>
                                <input size="43" class="form-control" type='text' name="email" value="{{$empresa->email or old('email')}}">  
                            </div>
                            
                            <div class="form-group painel-input">
                                <label class="painel-label">Site</label>
                                <input size="43" class="form-control" type='text' name="site" value="{{$empresa->site or old('site')}}">  
                            </div>
                             
                            <div class="form-group painel-input">
                                <label class="painel-label">Telefone</label>
                                <input size="16" class="form-control" type='text' id="telefone"  name="telefone" value="{{$empresa->telefone or old('telefone')}}">  
                            </div>
                             
                            <div class="form-group painel-input">
                                <label class="painel-label">FAX</label>
                                <input size="16" class="form-control" type='text' id='fax' name="fax" value="{{$empresa->fax or old('fax')}}">  
                            </div>
                            
                            <div class="form-group painel-input">
                                <label class="painel-label">Celular</label>
                                <input size="16" class="form-control" type='text' id='celular' name="celular" value="{{$empresa->celular or old('celular')}}">  
                            </div>
                        </div>        
                    </div>
                    
                    <hr>                   
                    <button class="btn btn-primary painel-btn"> <span class="fa fa-save"></span></button>
                   
                </form>
            </div>
        </div>    
@endsection

@section('post-script-logradouros')

     <script src="{{url('assets/all/js/buscalogradouro.js')}}"></script>
     <script src="{{url('assets/painel/js/uploadLogomarca.js')}}"></script>

@endsection