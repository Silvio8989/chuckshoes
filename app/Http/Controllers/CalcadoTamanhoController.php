<?php

namespace App\Http\Controllers;

use App\Models\calcadoTamanho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CalcadoTamanhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $array = array('p' => 'pequeno' , 'm' => 'médio', 'g' => 'grande');
        $objeto = collect($array);
        dd($array['p'],$objeto->get('p'));

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
       $validacao = Validator::make($valores,['tamanho' => 'required']);
       if($validacao->fails()){
            return 'Preencha os campos obrigatórios'; 
       }
       calcadoTamanho::create($valores);
       return 'salvo'; 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\calcadoTamanho  $calcadoTamanho
     * @return \Illuminate\Http\Response
     */
    public function show(calcadoTamanho $calcadoTamanho, $id)
    {
         $show =  $calcadoTamanho->find($id);
       if ($show){
           return $show->toJson();
       }else{
            return 'Registro não foi encontrado';

       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\calcadoTamanho  $calcadoTamanho
     * @return \Illuminate\Http\Response
     */
    public function edit(calcadoTamanho $calcadoTamanho)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\calcadoTamanho  $calcadoTamanho
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, calcadoTamanho $calcadoTamanho, $id)
    {
        $valores = $request->all();
        $validacao = Validator::make($valores,['tamanho' => 'required']);
        if($validacao->fails()){
            return 'Preencha os campos obrigatórios'; 
        }
        $atual = $calcadoTamanho->find($id);
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
     * @param  \App\Models\calcadoTamanho  $calcadoTamanho
     * @return \Illuminate\Http\Response
     */
    public function destroy(calcadoTamanho $calcadoTamanho, $id)
    {
       $calcadoTamanho->destroy($id);
         return 'Item excluído com sucesso';
    }
}
