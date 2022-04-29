<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VendaController extends Controller
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
            'total' => 'required',
            'desconto' => 'required',
            'juros' => 'required',
            'valor_pagamento' => 'required',
            'forma_pagamento' => 'required',
    ]);
       if($validacao->fails()){
            return 'Preencha os campos obrigatórios'; 
       }
       
       $venda = Venda::create($valores);
       $venda_id = $venda->id;
        $total = 0;
        dd($valores['calcados_id']);
        foreach($valores['calcados_id'] as $chave => $calcados_id){
            $valortotal = $valores['valor_produto'][$chave] * $valores['quantidade'][$chave]; 
            $total = $total + $valortotal;
            dd('teste');
            $salvar[] = [
                'vendas_id' => $venda_id,
                'calcados_id' => $calcados_id,
                'quantidade' => $valores['quantidade'][$chave],
                'valor_produto' => $valores['valor_produto'][$chave],
                'valor_pagamento' => $valortotal
            ]; 
        }

        dd('teste');
        VendasLivros::insert($salvar);
        $atual = $vendas->find($venda_id);    
        $atual->update(['valortotal' => $total]);  
       return 'salvo'; 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function show(venda $venda, $id)
    {
       $show =  $venda->find($id);
       if ($show){
           return $show->toJson();
       }else{
            return 'Registro não foi encontrado';

       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function edit(venda $venda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, venda $venda, $id)
    {
        $valores = $request->all();
        $validacao = Validator::make($valores,['venda' => 'required']);
        if($validacao->fails()){
            return 'Preencha os campos obrigatórios'; 
        }
        $atual = $venda->find($id);
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
     * @param  \App\Models\venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function destroy(venda $venda, $id)
    {
         $venda->destroy($id);
         return 'Item excluído com sucesso';
    }
}
