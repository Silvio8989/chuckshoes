<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendasProdutos extends Model
{
    use HasFactory;
    protected $table = 'vendas_produtos';
    protected $primaryKey = 'id';
    protected $fillable = [
      'vendas_id',
      'calcados_id',
      'quantidade',
      'valor_produto',
      'desconto',
      'valor_pagamento'
    ];

    public function Venda(){
      return $this->belongsTo('App\Models\Venda', 'vendas_id');
    }

    public function Calcado(){
      return $this->belongsTo('App\Models\Calcado', 'calcados_id');
    }

}



