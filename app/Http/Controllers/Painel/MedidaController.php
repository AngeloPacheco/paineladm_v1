<?php

namespace App\Http\Controllers\Painel;
use App\Http\Controllers\Controller;
use App\Models\Painel\Medida;
use App\Http\Requests\Painel\MedidaFormRequest;

class MedidaController extends Controller
{
    
    private $medida;
    private  $totalPage = 10;
    
    public function __construct(Medida $medida){
        $this->medida = $medida;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Medidas';
        $medidas =  $this->medida->orderBy('descricao','asc')->paginate($this->totalPage);
        return view('painel.medidas.index', compact('title', 'medidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastrar Medida';
        return view('painel.medidas.create-edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedidaFormRequest $request)
    {
        $dataForm = $request->all();
        
         if ( existeMedida($dataForm['descricao'],$dataForm['sigla']) ){

            $messagens = ['descricao.unique' => 'Medida já cadastrada',
                          'sigla.unique'     => 'Sigla já cadastrada'
                         ];

            $this->validate($request, [
                'descricao' => 'unique:medidas',
                'sigla' => 'unique:medidas'
             ], $messagens);
               
        }else{
        
            $insert = $this->medida->create($dataForm);
        
            if ($insert) {
                return redirect('/painel/medidas');
            } else {
                return redirect()->route('painel.medidas.create-edit');
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
       $medida = $this->medida->find($id);
       $title = "Medida:  {$medida->descricao}";
       return view('painel.medidas.show' , compact('medida', 'title')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Editar Medida';
        $medida= $this->medida->find($id);
        return view('painel.medidas.create-edit',compact('medida', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MedidaFormRequest $request, $id)
    {
        $dataForm = $request->all();
        $medida   = $this->medida->find($id); 
        $update   = $medida->update($dataForm);
        
        if( $update ){
            return redirect('/painel/medidas');
        }
            else{
            return redirect()->route('medidas.edit', $id)->with(['errors' => 'Erro ao editar']);
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
      $medida = $this->medida->find($id);
      $delete = $medida->delete();
        
        if ($delete){
            return redirect('/painel/medidas');
        }    
        else {
            return redirect()->route('painel.medidas.index', $id)->with(['errors' => 'Erro ao exluir.']);
        }
    }
}
