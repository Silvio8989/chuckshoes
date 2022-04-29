<?php

namespace App\Http\Controllers;

use App\Models\calcadoGenero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CalcadoGeneroController extends Controller
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
       $validacao = Validator::make($valores,['genero' => 'required']);
       if($validacao->fails()){
            return 'Preencha os campos obrigatórios'; 
       }
       CalcadoGenero::create($valores);
       return 'salvo'; 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\calcadoGenero  $calcadoGenero
     * @return \Illuminate\Http\Response
     */
    public function show(calcadoGenero $calcadoGenero, $id)
    {
       $show =  $calcadoGenero->find($id);
       if ($show){
           return $show->toJson();
       }else{
            return 'Registro não foi encontrado';

       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\calcadoGenero  $calcadoGenero
     * @return \Illuminate\Http\Response
     */
    public function edit(calcadoGenero $calcadoGenero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\calcadoGenero  $calcadoGenero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, calcadoGenero $calcadoGenero, $id)
    {
        $valores = $request->all();
        $validacao = Validator::make($valores,['genero' => 'required']);
        if($validacao->fails()){
            return 'Preencha os campos obrigatórios'; 
        }
        $atual = $calcadoGenero->find($id);
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
     * @param  \App\Models\calcadoGenero  $calcadoGenero
     * @return \Illuminate\Http\Response
     */
    public function destroy(calcadoGenero $calcadoGenero, $id)
    {
      $calcadoGenero->destroy($id);
         return 'Item excluído com sucesso';
    }
}
