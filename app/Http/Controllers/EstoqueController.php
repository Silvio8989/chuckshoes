<?php

namespace App\Http\Controllers;

use App\Models\estoque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EstoqueController extends Controller
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
            'fornecedores_id' => 'required',
            'calcados_id' => 'required',
            'estoque_quantidade' => 'required',
            'preco_entrada' => 'required',
            'estoque_minimo' => 'required',
            'data_compra' => 'required'
        ]);
       if($validacao->fails()){
            return 'Preencha os campos obrigatórios'; 
       } 
        estoque::create($valores);                 
        return 'salvo'; 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\estoque  $estoque
     * @return \Illuminate\Http\Response
     */
    public function show(estoque $estoque, $id)
    {
       $show =  $estoque->find($id);
       if ($show){
           return $show->toJson();
       }else{
            return 'Registro não foi encontrado';

       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\estoque  $estoque
     * @return \Illuminate\Http\Response
     */
    public function edit(estoque $estoque)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\estoque  $estoque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $valores = $request->all();
        $validacao = Validator::make($valores,[
            'fornecedores_id' => 'required',
            'calcados_id' => 'required',
            'estoque_quantidade' => 'required',
            'preco_entrada' => 'required',
            'estoque_minimo' => 'required',
            'data_compra' => 'required'
        ]);
        if($validacao->fails()){
            return 'Preencha os campos obrigatórios'; 
        }
        $atual = estoque::find($id);
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
     * @param  \App\Models\estoque  $estoque
     * @return \Illuminate\Http\Response
     */
    public function destroy(estoque $estoque, $id)
    {
        $estoque->destroy($id);
         return 'Item excluído com sucesso';
    }
}
