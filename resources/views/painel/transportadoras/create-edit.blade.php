@extends('painel.index')
@section('content')

    @if ( isset($transportadora))
        
        
        
        <div class="row painel-row">
            <div class="col-xs-12">
                <h1>Editar transportadora</h1>
                <form class="form-inline" method="post" action="{{route('transportadoras.update', $transportadora->id)}}">    
                  {!! method_field('PUT') !!}
   @else        
        <div class="row painel-row">
            <div class="col-xs-12">
                <h1>Cadastrar transportadora</h1>
                <form class="form-inline" method="post" action="{{route('transportadoras.store')}}">    
    @endif
    
    @if (isset($errors) && count($errors) > 0)
        <div class="alert alert-danger">
             <p>Sistema Informa: </p>
             @foreach($errors->all() as $error)
                 <p>{{$error}}</p>
             @endforeach
        </div>
    @endif

                   {!! csrf_field()!!} 
                   <div class="panel panel-default">
                        <div class='panel-body'>

                            <div class="form-group painel-input">
                                <label class="painel-label">Razão Social</label>
                                <input size="45" class="form-control" type='text' name="razao_social" value="{{$transportadora->razao_social or old('razao_social')}}" autofocus="">  
                            </div>

                            <div class="form-group painel-input">
                                <label class="painel-label">Nome Fantasia</label>
                                 <input size="41" class="form-control" type='text' name="nome_fantasia" value="{{$transportadora->nome_fantasia or old('nome_fantasia')}}">  
                            </div>
                             
                            <div class="form-group painel-input">
                                <label class="painel-label">CNPJ</label>
                                <input size="20" class="form-control" type='text' id='cnpj' name="cnpj" value="{{$transportadora->cnpj or old('cnpj')}}">  
                            </div>

                            <div class="form-group painel-input">
                                    <label class="painel-label">Inscrição Estadual</label>
                                    <input size="20" class="form-control" type='text' name="inscricao_estadual" value="{{$transportadora->inscricao_estadual or old('inscricao_estadual')}}">  
                                </div>
                            
                        </div>        
                    </div>
                        
                    <div class="panel panel-default">
                        <div class='panel-body'>

                            <div class="form-group painel-input">
                                <label class="painel-label">CEP</label>
                                <input size="15" class="form-control" type='text' id='cep' name='cep' value="{{$transportadora->cep or old('cep')}}">  
                            </div>
                        
                            <div class="form-group painel-input">
                                <label class="painel-label">Logradouro</label>
                                <input size="51" class="form-control" type='text' id="logradouro" name="logradouro" value="{{$transportadora->logradouro or old('logradouro')}}">  
                             </div>
                             
                            <div class="form-group painel-input">
                                <label class="painel-label">Número</label>
                                <input size="10" class="form-control" type='text' name="numero" value="{{$transportadora->numero or old('numero')}}">  
                             </div>
                             
                            <div class="form-group painel-input">
                                <label class="painel-label">Complemento</label>
                                <input size="10" class="form-control" type='text' name="complemento" value="{{$transportadora->complemento or old('complemento')}}">  
                             </div>
                             
                            <div class="form-group painel-input">
                                <label class="painel-label">Bairro</label>
                                <input size="30" class="form-control" type='text' id="bairro" name="bairro" value="{{$transportadora->bairro or old('bairro')}}">  
                            </div>
                             
                            <div class="form-group painel-input">
                                <label class="painel-label">Cidade</label>
                                <input size="20" class="form-control" type='text' id='localidade' name='localidade' value="{{$transportadora->localidade or old('localidade')}}">  
                            </div>
                             
                            <div class="form-group painel-input">
                                <label class="painel-label">Estado</label>
                                <input size="5" class="form-control" type='text' id='uf' name='uf' value="{{$transportadora->uf or old('uf')}}">  
                            </div>
                        </div>    
                    </div>    
                    
                    <div class="panel panel-default">
                        <div class='panel-body'>
                            
                            <div class="form-group painel-input">
                                <label class="painel-label">E-mail</label>
                                <input size="40" class="form-control" type='email' name="email" value="{{$transportadora->email or old('email')}}">  
                            </div>
                             
                            <div class="form-group painel-input">
                                <label class="painel-label">Telefone</label>
                                <input size="15" class="form-control" type='text' id="telefone"  name="telefone" value="{{$transportadora->telefone or old('telefone')}}">  
                            </div>
                             
                            <div class="form-group painel-input">
                                <label class="painel-label">FAX</label>
                                <input size="15" class="form-control" type='text' id='fax' name="fax" value="{{$transportadora->fax or old('fax')}}">  
                            </div>
                            
                            <div class="form-group painel-input">
                                <label class="painel-label">Celular</label>
                                <input size="15" class="form-control" type='text' id='celular' name="celular" value="{{$transportadora->celular or old('celular')}}">  
                            </div>

                            <div class="form-group painel-input">
                                <label class="painel-label">Contato</label>
                                <input size="30" class="form-control" type='text' id='contato' name="contato" value="{{$transportadora->contato or old('contato')}}">  
                            </div>
                        </div>        
                    </div>          
                        <button class="btn btn-primary painel-btn" title="Salvar"> <span class="fa fa-save"></span></button>                      
                </form>
@endsection

@section('post-script-logradouros')

     <script src="{{url('assets/all/js/buscalogradouro.js')}}"></script>

@endsection