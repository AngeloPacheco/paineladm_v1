@extends('painel.index')
@section('content')

<h1 class='painel-title'>Detalhes da transportadora</h1>

<div class="row painel-row">
    <div class="col-xs-12">    
        <div class='panel panel-default'>
            <div class="panel-body">
                <p><b>Razão Social: </b>{{$transportadora->razao_social}}</p>
                <p><b>Nome Fantasia: </b>{{$transportadora->nome_fantasia}}</p>
                <p><b>CNPJ: </b>{{$transportadora->cnpj}}</p>
                <p><b>Inscrição Estadual: </b>{{$transportadora->inscricao_estadual}}</p>
                <p><b>Logradouro: </b>{{$transportadora->logradouro}}</p>
                <p><b>Número: </b>{{$transportadora->numero}}</p>
                <p><b>Complemento: </b>{{$transportadora->complemento}}</p>
                <p><b>Bairro </b>{{$transportadora->bairro}}</p>
                <p><b>Cidade </b>{{$transportadora->localidade}}</p>
                <p><b>CEP </b>{{$transportadora->cep}}</p>
                <p><b>Estado: </b>{{$transportadora->uf}}</p>
                <p><b>Telefone: </b>{{$transportadora->telefone}}</p>
                <p><b>FAX: </b>{{$transportadora->fax}}</p>
                <p><b>Celular: </b>{{$transportadora->celular}}</p>
                <p><b>E-mail: </b>{{$transportadora->email}}</p>
                <p><b>Data de Cadastro: </b> {{date_format($transportadora->created_at,'d/m/Y')}}</p>
                <p><b>Última atualização: </b> {{date_format($transportadora->updated_at,'d/m/Y')}}</p>
            </div>
        </div>

        @if (isset($errors) && count($errors) > 0)
               <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
        @endif
        <hr>

        <form class="form" method="post" action="{{route('transportadoras.destroy', $transportadora->id)}}">
             {!! csrf_field()!!} 
             {!! method_field('DELETE') !!}

            <a href="{{url('/painel/transportadoras')}}" class="btn btn-primary painel-btn" title="Listar todas transportadoras">
               <span class="fa fa-list"></span> 
            </a>

            <button class="btn btn-danger painel-btn" title="Excluir"> <span class="fa fa-trash"></span></button>
            
            <a href="{{route('transportadoras.edit', $transportadora->id)}}" title="Editar" class="btn btn-primary painel-btn">
               <span class="fa fa-pencil"></span>
            </a>

            

          
        </form>
    </div>
</div>        
@endsection