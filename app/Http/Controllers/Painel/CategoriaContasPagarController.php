<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\DB;
use App\Models\Painel\CategoriaContasPagar;
use App\Http\Requests\Painel\CategoriaContasPagarFormRequest;

class CategoriaContasPagarController extends Controller
{
    
    private $categoria;
    private  $totalPage = 10;
    
    public function __construct(CategoriaContasPagar $categoria){
       
        $this->categoria = $categoria;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Categoria Contas a Pagar';
        
        $categorias =  $this->categoria->orderBy('descricao','asc')->paginate($this->totalPage);
        return view('painel.categoria-contas-pagar.index', compact('title', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Nova Categoria Contas a Pagar';
        return view('painel.categoria-contas-pagar.create-edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaContasPagarFormRequest $request)
    {
        $dataForm = $request->all();
        
        if ( existeCategoriaContasPagar($dataForm['descricao']) ){

            $messagens = ['descricao.unique' => 'Categoria já cadastrada'];

            $this->validate($request, [
                'descricao' => 'unique:categoria_pagar_contas',
             ], $messagens);
               
        }else{          

            $insert = $this->categoria->create($dataForm);
            
            if ($insert) {
                return redirect('/painel/categoria-contas-pagar');
            } else {
                return redirect()->route('painel.categoria-contas-pagar.create-edit');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Editar Categoria Contas a Pagar';

        $categoria = $this->categoria->find($id);

        //echo '<pre>'; print_r($catContaPagar); echo '</pre>';
        //die;

        return view('painel.categoria-contas-pagar.create-edit', compact('categoria','title'));
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaContasPagarFormRequest $request, $id)
    {
        $dataForm  = $request->all();
        $categoria = $this->categoria->find($id); 
        $update    = $categoria->update($dataForm);
        
        if( $update ){
            return redirect('/painel/categoria-contas-pagar');
        } else {
            return redirect()->route('painel.categoria-contas-pagar.create-edi');
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
            return redirect('/painel/categoria-contas-pagar');
        }    
        else {
            return redirect()->route('forma-categoria-contas-pagar.index', $id)->with(['errors' => 'Erro ao exluir.']);
        }
    }

    public function busca(Request $request){

        $title = "Pesquisa Categoria contas a pagar";

        $key = $request->input('descricao');

            $categorias = DB::table('categoria_pagar_contas')
                     ->where('categoria_pagar_contas.descricao','like','%'. $key .'%')
                     ->Paginate($this->totalPage);
             
        if (count($categorias) > 0){
             
            $msg = 'Sistema informa: A pesquisa retornou '. count($categorias) . ' registro(s)';

            return view('painel.categoria-contas-pagar.busca', compact('title','categorias','msg')); 
        }

            $msg = 'Sistema informa: A pesquisa não retornou registro(s)';

            return view('painel.categoria-contas-pagar.busca', compact('title', 'categorias','msg'));
    }
}
