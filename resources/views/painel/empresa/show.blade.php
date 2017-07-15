@extends('painel.index')
@section('content')

<h1 class="painel-title"> Dados da Empresa</h1>
    <div class="row painel-row">
        <div class="col-xs-12">
            <div class="panel panel-default painel-panel">
                <div class="panel-body">

                    <div class="logomarca">
                        @foreach($imagens as $imagem)
                             @if ($imagem)
                               <img class="img-thumbnail" src="{{url('storage'). '/' . $imagem->nm_imagem}}">
                             @endif  
                        @endforeach 
                    </div>           
                   
                    
                        @foreach($empresas as $empresa)
                            @if ($empresa)
                                <p><b>Razão Social : </b> {{$empresa->razao_social}}</p>
                                <p><b>Nome Fantasia : </b> {{$empresa->nome_fantasia}}</p>
                                <p><b>Responsável : </b> {{$empresa->responsavel}}</p>
                                <p><b>CNPJ : </b> {{$empresa->cnpj}}</p>
                                <p><b>Inscrição Estadual : </b> {{$empresa->inscricao_estadual}}</p>
                                <p><b>Endereco : </b> {{$empresa->logradouro}}</p>
                                <p><b>Número : </b> {{$empresa->numero}}</p>
                                <p><b>Complemento : </b> {{$empresa->complemento}}</p>
                                <p><b>Bairro : </b>  {{$empresa->bairro}}</p>
                                <p><b>Cidade : </b>  {{$empresa->localidade}}</p>
                                <p><b>CEP : </b> {{$empresa->cep}}</p>
                                <p><b>Estado : </b>  {{$empresa->uf}}</p>
                                <p><b>E-mail : </b> {{$empresa->email}}</p>
                                <p><b>Site : </b> {{$empresa->site}}</p>
                                <p><b>Telefone : </b> {{$empresa->telefone}}</p>
                                <p><b>Fax : </b> {{$empresa->fax}}</p>
                                <p><b>Celular :  </b>{{$empresa->celular}}</p>
                                <p><b>Data de cadastro : </b> {{date_format($empresa->created_at,'d/m/Y')}}</p>
                                <p><b>Últma atualização :</b>  {{date_format($empresa->updated_at,'d/m/Y')}}</p>
                            @endif  
                        @endforeach 
                   
                </div>
            </div>
                    <a href="{{route('empresa.edit', $empresa->id)}}" class="btn btn-primary painel-btn" title="Editar dados da Empresa ">
                       <span class="fa fa-edit"></span>
                    </a>
        </div>
    </div>                
@endsection