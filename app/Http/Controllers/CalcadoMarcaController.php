<?php

namespace App\Http\Controllers;

use App\Models\calcadoMarca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CalcadoMarcaController extends Controller
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
       $validacao = Validator::make($valores,['marcas' => 'required']);
       if($validacao->fails()){
            return 'Preencha os campos obrigatórios'; 
       }
       calcadoMarca::create($valores);
       return 'salvo'; 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\calcadoMarca  $calcadoMarca
     * @return \Illuminate\Http\Response
     */
    public function show(calcadoMarca $calcadoMarca, $id)
    {
         $show =  $calcadoMarca->find($id);
       if ($show){
           return $show->toJson();
       }else{
            return 'Registro não foi encontrado';

       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\calcadoMarca  $calcadoMarca
     * @return \Illuminate\Http\Response
     */
    public function edit(calcadoMarca $calcadoMarca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\calcadoMarca  $calcadoMarca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, calcadoMarca $calcadoMarca, $id)
    {
        $valores = $request->all();
        $validacao = Validator::make($valores,['marcas' => 'required']);
        if($validacao->fails()){
            return 'Preencha os campos obrigatórios'; 
        }
        $atual = $calcadoMarca->find($id);
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
     * @param  \App\Models\calcadoMarca  $calcadoMarca
     * @return \Illuminate\Http\Response
     */
    public function destroy(calcadoMarca $calcadoMarca, $id)
    {
         $calcadoMarca->destroy($id);
         return 'Item excluído com sucesso';
    }
}
