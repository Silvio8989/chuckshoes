<?php

namespace App\Http\Controllers;

use App\Models\CalcadoCor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CalcadoCorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(calcadoCor $calcadoCor)
    {
        return $calcadoCor->get();
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
       $validacao = Validator::make($valores,['cor' => 'required']);
       if($validacao->fails()){
            return 'Preencha os campos obrigatórios'; 
       }
       CalcadoCor::create($valores);
       return 'salvo'; 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\calcadoCor  $calcadoCor
     * @return \Illuminate\Http\Response
     */
    public function show(calcadoCor $calcadoCor, $id)
    { 
       $show =  $calcadoCor->find($id);
       if ($show){
           return $show->toJson();
       }else{
            return 'Registro não foi encontrado';

       }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\calcadoCor  $calcadoCor
     * @return \Illuminate\Http\Response
     */
    public function edit(calcadoCor $calcadoCor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\calcadoCor  $calcadoCor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, calcadoCor $calcadoCor, $id)
    {
        $valores = $request->all();
        $validacao = Validator::make($valores,['cor' => 'required']);
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
     * @param  \App\Models\calcadoCor  $calcadoCor
     * @return \Illuminate\Http\Response
     */
    public function destroy(calcadoCor $calcadoCor, $id)
    {
         $calcadoCor->destroy($id);
         return 'Item excluído com sucesso';
    }
}
