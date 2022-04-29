<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalcadoGenero extends Model
{
    use HasFactory;
    protected $table = 'calcado_generos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'genero',
    ];

    public function Calcado(){
      return $this->hasMany('App\Models\Calcado', 'genero_id');
    }
}
