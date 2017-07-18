<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Transportadora;
use App\Http\Requests\Painel\TransportadoraFormRequest;
use \Illuminate\Support\Facades\DB;



class TransportadoraController extends Controller
{
    
    private $transportadora;
    private $totalPage = 10;


    public function __construct(Transportadora $transportadora){
        
        $this->transportadora = $transportadora;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Transportadoras';
        
        $transportadoras = $this->transportadora->orderBy('razao_social','asc')->paginate($this->totalPage);

        return view('painel.transportadoras.index', compact('title', 'transportadoras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastrar Transportadora';
        
        return view('painel.transportadoras.create-edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransportadoraFormRequest $request)
    {
         $dataForm = $request->all();

        if ( existeCNPJTransportadora($dataForm['cnpj']) ){
             
            $messagens = ['cnpj.unique' => 'CNPJ já cadastrado'];

            $this->validate($request, [
                'cnpj' => 'unique:transportadoras',
             ], $messagens);

            echo "<script type='text/javascript'>
                  document.getElementById(cnpj).focus();
                 </script>";
               
        }else{
          
            $insert = $this->transportadora->create($dataForm);
            
            if ($insert) {
                return redirect('/painel/transportadoras');
            } else {
                return redirect()->route('painel.transportadoras.create-edit');
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
       $transportadora = $this->transportadora->find($id);
       $title = "Transportadora:  {$transportadora->razao_social}";
       
       return view('painel.transportadoras.show' , compact('title','transportadora')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Editar Transportadora';
        $transportadora= $this->transportadora->find($id);
        return view('painel.transportadoras.create-edit',compact('transportadora', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransportadoraFormRequest $request, $id)
    {
        $dataForm = $request->all();
        $transportadora   = $this->transportadora->find($id); 
        
        $update   = $transportadora->update($dataForm);
        
        if( $update ){
            return redirect('/painel/transportadoras');
        }
            else{
            return redirect()->route('transportadoras.edit', $id)->with(['errors' => 'Erro ao editar']);
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
        $transportadora = $this->transportadora->find($id);
        $delete = $transportadora->delete();
        
        if ($delete){
            return redirect('/painel/transportadoras');
        }    
        else {
            return redirect()->route('painel.transportadoras.index', $id)->with(['errors' => 'Erro ao exluir.']);
        }
    }

    public function busca(Request $request){

        $title = "Pesquisa Transportadora";

        $key = $request->input('descricao');

            $transportadoras = DB::table('transportadoras')
                     ->where('transportadoras.razao_social','like','%'. $key .'%')
                     ->orwhere('transportadoras.nome_fantasia','like','%'. $key .'%')
                     ->orwhere('transportadoras.cnpj','like','%'. $key .'%')
                     ->orderby('transportadoras.razao_social','asc')
                     ->Paginate($this->totalPage);
             
        if (count($transportadoras) > 0){
             
            $msg = 'Sistema informa: A pesquisa retornou '. count($transportadoras) . ' registro(s)';
            return view('painel.transportadoras.busca', compact('title','transportadoras','msg')); 
        }else{

            $msg = 'Sistema informa: A pesquisa não retornou registro(s)';
            return view('painel.transportadoras.busca', compact('title', 'transportadoras','msg'));
        }    
    }
}
