<?php

namespace App\Http\Controllers;

use App\Models\Calcado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CalcadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valores = $request->all();
        $validacao = Validator::make($valores,[
            'marca_id' => 'required',
            'cor_id' => 'required',
            'genero_id' => 'required',
            'tamanhos_id' => 'required',
            'modelo' => 'required',
            'preco_venda' => 'required'
        ]);
       if($validacao->fails()){
            return 'Preencha os campos obrigatórios'; 
       }
       Calcado::create($valores);
       return 'salvo'; 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calcado  $calcado
     * @return \Illuminate\Http\Response
     */
    public function show(Calcado $calcado, $id)
    {
         $show =  $calcado->find($id);
       if ($show){
           return $show->toJson();
       }else{
            return 'Registro não foi encontrado';

       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calcado  $calcado
     * @return \Illuminate\Http\Response
     */
    public function edit(Calcado $calcado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Calcado  $calcado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calcado $calcado, $id)
    {
        $valores = $request->all();
        $validacao = Validator::make($valores,[
            'marca_id' => 'required',
            'cor_id' => 'required',
            'genero_id' => 'required',
            'tamanhos_id' => 'required',
            'modelo' => 'required',
            'preco_venda' => 'required'
        ]);
        
        if($validacao->fails()){
            return 'Preencha os campos obrigatórios'; 
        }
        $atual = $calcadoCor->find($id);
        if($atual){
            $atual->update($valores);
            return 'Atualizado com sucesso';
        } else{
            return 'Não foi possível atualizar';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calcado  $calcado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calcado $calcado, $id)
    {
        $calcado->destroy($id);
        return 'Item excluído com sucesso';
    }
}
