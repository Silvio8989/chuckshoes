<?php

namespace App\Http\Controllers;

use App\Models\devolucaoProdutos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DevolucaoProdutosController extends Controller
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
       $validacao = Validator::make($valores,['devolução' => 'required']);
       if($validacao->fails()){
            return 'Preencha os campos obrigatórios'; 
       }
       devolucaoProdutos::create($valores);
       return 'salvo'; 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\devolucaoProdutos  $devolucaoProdutos
     * @return \Illuminate\Http\Response
     */
    public function show(devolucaoProdutos $devolucaoProdutos, $id)
    {
       $show =  $devolucaoProdutos->find($id);
       if ($show){
           return $show->toJson();
       }else{
            return 'Registro não foi encontrado';

       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\devolucaoProdutos  $devolucaoProdutos
     * @return \Illuminate\Http\Response
     */
    public function edit(devolucaoProdutos $devolucaoProdutos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\devolucaoProdutos  $devolucaoProdutos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, devolucaoProdutos $devolucaoProdutos, $id)
    {
        $valores = $request->all();
        $validacao = Validator::make($valores,['devolução' => 'required']);
        if($validacao->fails()){
            return 'Preencha os campos obrigatórios'; 
        }
        $atual = $devolucaoProdutos->find($id);
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
     * @param  \App\Models\devolucaoProdutos  $devolucaoProdutos
     * @return \Illuminate\Http\Response
     */
    public function destroy(devolucaoProdutos $devolucaoProdutos, $id)
    {
        $devolucaoProdutos->destroy($id);
         return 'Item excluído com sucesso';
    }
}
