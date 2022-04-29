<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    use HasFactory;
    protected $table = 'estoques';
    protected $primaryKey = 'id';
    protected $fillable = [
        'fornecedores_id',
        'calcados_id',
        'estoque_quantidade',
        'preco_entrada',
        'estoque_minimo',
        'data_compra'
    ];

     public function Fornecedor(){
        return $this->belongsTo('App\Models\Fornecedor', 'fornecedores_id');
    }

     public function Calcado(){
        return $this->belongsTo('App\Models\CalcadoMarca', 'calcados_id');
    }

    
}