<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Painel\CategoriaProduto;
use App\Http\Requests\Painel\CategoriaProdutoFormRequest;




class CategoriaProdutoController extends Controller
{
    private $categoria;
    private $totalPage = 10;

    public function __construct(CategoriaProduto $categoria){
        $this->categoria = $categoria;
    }
    
    public function index()
    {
        $title = 'Categorias de Produtos';
        
        $categorias = $this->categoria->orderBy('descricao','asc')->paginate($this->totalPage);
        return view('painel.categoria-produtos.index', compact('title', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $title = 'Cadastrar Mategoria';
        return view('painel.categoria-produtos.create-edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaProdutoFormRequest $request)
    {
       
        $dataForm = $request->all();
        
        if ( existeCategoriaProdutos($dataForm['descricao']) ){

            $messagens = ['descricao.unique' => 'Categoria já cadastrada'];

            $this->validate($request, [
                'descricao' => 'unique:categoria_produtos',
             ], $messagens);
               
        }else{

            $insert = $this->categoria->create($dataForm);
            
            if ($insert) {
                return redirect('/painel/categoria-produtos');
            } else {
                return redirect()->route('painel.categoria-produtos.create-edit');
            }
        }    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $categoria = $this->categoria->find($id);
        $title = "Categoria:  {$categoria->descricao}";
       
        return view('painel.categoria-produtos.show' , compact('categoria', 'title')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria= $this->categoria->find($id);
        $title = 'Editar Categoria';
        return view('painel.categoria-produtos.create-edit',compact('categoria', 'title'));
                
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaProdutoFormRequest $request, $id)
    {
        
        $dataForm   = $request->all();
        $categoria  = $this->categoria->find($id); 
        $update     = $categoria->update($dataForm);
        
        if( $update ){
            return redirect('/painel/categoria-produtos');
        }
            else{
            return redirect()->route('categoria-produtos.edit', $id)->with(['errors' => 'Erro ao editar.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = $this->categoria->find($id);
        $delete = $categoria->delete();
        
        if ($delete){
            return redirect('/painel/categoria-produtos');
        }    
        else {
            return redirect()->route('categoria-produtos.show', $id)->with(['errors' => 'Erro ao exluir a categoria']);
        }
    }
}
