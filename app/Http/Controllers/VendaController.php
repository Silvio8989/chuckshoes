<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Models\VendasProdutos;
use App\Models\Estoque;
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
    public function store(Request $request, Venda $venda, Estoque $estoque)
    {
       $valores = $request->all();
       $validacao = Validator::make($valores,[
            'total' => 'required',
            'desconto' => 'required',
            'juros' => 'required',
            'forma_pagamento' => 'required',
    ]);
       if($validacao->fails()){
            return 'Preencha os campos obrigatórios'; 
       }
       $venda = Venda::create($valores);
       $venda_id = $venda->id;
        $total = 0; 
        foreach($valores['calcados_id'] as $chave => $calcados_id){
            $procuraEstoque = $estoque->where('calcados_id',$calcados_id)->get()->first();
            if ($procuraEstoque->estoque_quantidade >= $valores['quantidade'][$chave]){
                $valortotal = $valores['valor_produto'][$chave] * $valores['quantidade'][$chave]; 
                $total = $total + $valortotal;
                $salvar[] = [
                    'vendas_id' => $venda_id,
                    'calcados_id' => $calcados_id,
                    'quantidade' => $valores['quantidade'][$chave],
                    'valor_produto' => $valores['valor_produto'][$chave],
                    'valor_pagamento' => $valortotal
                ];
                $atualEstoque = $procuraEstoque->estoque_quantidade - $valores['quantidade'][$chave];
                $procuraEstoque->update(['estoque_quantidade' => $atualEstoque]);   
            } 
        }
        if (isset($salvar)){
            VendasProdutos::insert($salvar);
            $atual = $venda->find($venda_id);    
            $atual->update(['valor_pagamento' => $total]);      
            return 'salvo'; 
        } 
        return 'Produto sem estoque';
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
