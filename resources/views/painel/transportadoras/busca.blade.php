@extends('painel.index')
@section('content')

<div class="row painel-row">
    <div class="col-xs-12">

        <h1 class=''>Transportadoras</h1>
        
        <div class="form-search">
            <form class="form-inline" name="formPesquisa" method="post" role="form" action="{{url('painel/transportadoras/busca')}}">

                <input class="form-control" type="text" name="descricao" value="" placeholder="Pesquisar"  title='Pesquisa por Razão Social, Nome Fantasia ou CNPJ' autofocus="" size="20">
                 {!! csrf_field()!!}
                <button class="btn btn-primary painel-btn-pesquisar" type="submit" title="Pesquisar">
                        <span class="fa fa-search"></span>
                </button>
            </form>
        </div>

        <h5 class="msg-busca">{{$msg}}<h5>

        <table class="table table-striped">
            <tr class="painel-cabecalho">
                <th>Razão Social</th>
                <th>Nome Fantasia</th>
                <th>Cidade</th>
                <th>UF</th>
                <th>Telefone</th>
                <th>Contato</th>
                <th width="150px">Ações</th>
            </tr>
            @foreach($transportadoras as $transportadora)
                <tr>
                    <td>{{$transportadora->razao_social}}</td> 
                    <td>{{$transportadora->nome_fantasia}}</td> 
                    <td>{{$transportadora->localidade}}</td> 
                    <td>{{$transportadora->uf}}</td> 
                    <td>{{$transportadora->telefone}}</td> 
                    <td>{{$transportadora->contato}}</td> 
                    <td>  
                        <a class="btn-actions btn-edit" href="{{route('transportadoras.edit', $transportadora->id)}}">
                            <span class="fa fa-pencil" title="Editar"></span>
                        </a>
                        <a class="btn-actions btn-eye" href="{{route('transportadoras.show', $transportadora->id)}}">
                           <span class="fa fa-eye" title="Detalhes"></span>
                        </a>
                        <a class="btn-actions btn-delete" href="transportadoras/delete/{{$transportadora->id}}">
                           <span class="fa fa-trash" title="Excluir"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
        <hr>
        
        <a href="{{url('/painel/transportadoras')}}" class="btn btn-primary painel-btn" title="Listar todas transportadoras">
           <span class="fa fa-list"></span>
        </a>
        <a href="{{route('transportadoras.create')}}" class="btn btn-primary painel-btn" title="Cadastrar nova transportadora ">
            <span class="glyphicon glyphicon-plus"></span>
        </a>
        
        <div class="paginacao">
            {!! $transportadoras->links() !!}
        </div>
    </div>
</div>                
@endsection