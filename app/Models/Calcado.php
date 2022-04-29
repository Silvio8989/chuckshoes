<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calcado extends Model
{
    use HasFactory;
    protected $table = 'calcados';
    protected $primaryKey = 'id';
    protected $fillable = [
        'marca_id',
        'cor_id',
        'genero_id',
        'tamanhos_id',
        'modelo',
        'preco_venda',
        'desconto',
    ];

    public function Marca(){
        return $this->belongsTo('App\Models\CalcadoMarca', 'marca_id');
    }

    public function Cor(){
        return $this->belongsTo('App\Models\CalcadoCor', 'cor_id');
    }

    public function Genero(){
        return $this->belongsTo('App\Models\CalcadoGenero', 'genero_id');
    }

    public function Tamanho(){
        return $this->belongsTo('App\Models\CalcadoTamanho', 'tamanho_id');
    }

     public function Estoque(){
        return $this->belongsTo('App\Models\Estoque', 'calcado_id');
    }
}
