@extends('painel.index')
@section('content')

<div class="row painel-row">
    <div class="col-xs-12"> 
        <h1>Medidas</h1>
        <table class="table table-striped">
            <tr class="painel-tabela-cabecalho">
                <th>Descrição</th>
                <th>Sigla</th>
                <th width="100px">Ações</th>
            </tr>
            @foreach($medidas as $medida)
                <tr>
                    <td>{{$medida->descricao}}</td> 
                    <td>{{$medida->sigla}}</td> 
                    <td>  
                        <a class="btn-actions btn-edit" href="{{route('medidas.edit', $medida->id)}}">
                            <span class="fa fa-pencil" title="Editar"></span>
                        </a>
                        <a class="btn-actions btn-delete" href="medidas/delete/{{$medida->id}}">
                       <span class="fa fa-trash" title="Excluir"></span>
                    </a>
                    </td>
                </tr>
            @endforeach
        </table>
         <hr>
                <a href="{{route('medidas.create')}}" class="btn btn-primary painel-btn" title="Cadastrar nova medida ">
                    <span class="glyphicon glyphicon-plus"></span>
                </a>
                <div class="paginacao">
                    {!! $medidas->links() !!}
                </div>
            
        
    </div>
</div>        
@endsection