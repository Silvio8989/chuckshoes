<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;
    protected $table = 'vendas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'total',
        'desconto',
        'juros',
        'valor_pagamento',
        'cupom',
        'forma_pagamento',
        'data_venda'
    ];
}