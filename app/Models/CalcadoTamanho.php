<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalcadoTamanho extends Model
{
    use HasFactory;
    protected $table = 'calcado_tamanhos';
    protected $primaryKey = 'id';
    protected $fillable = [ 
        'tamanho',
    ];

  public function Calcado(){
        return $this->hasMany('App\Models\Calcado', 'tamanho_id');
    }
}
