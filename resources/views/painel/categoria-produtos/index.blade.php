@extends('painel.index')
@section('content')

<h1 class='painel-title'>Categoria de Produtos</h1>

<div class="row painel-row">
    <div class="col-xs-12"> 
        <table class="table table-striped">
            <tr class="painel-tabela-cabecalho">
                <th>Descrição</th>
                <th width="100px">Ações</th>
            </tr>
            @foreach($categorias as $categoria)
                <tr>
                    <td>{{$categoria->descricao}}</td> 
                    <td>  
                        <a class="btn-actions btn-edit" href="{{route('categoria-produtos.edit', $categoria->id)}}">
                            <span class="fa fa-pencil" title="Editar"></span>
                        </a>
                        <a class="btn-actions btn-delete" href="categoria-produtos/delete/{{$categoria->id}}">
                           <span class="fa fa-trash" title="Excluir"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>

        <hr>
        <a href="{{route('categoria-produtos.create')}}" class="btn btn-primary painel-btn" title="Cadastrar nova categoria ">
            <span class="glyphicon glyphicon-plus"></span>
        </a>
        <div class="paginacao">
            {!! $categorias->links() !!}
        </div>

    </div>
</div>
@endsection