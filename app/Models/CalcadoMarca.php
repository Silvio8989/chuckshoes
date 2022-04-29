<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalcadoMarca extends Model
{
    use HasFactory;
     protected $table = 'calcado_marcas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'marcas', 
        'status'
    ];

    public function Calcado(){
        return $this->hasMany('App\Models\Calcado', 'marca_id');
    }

}



