<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalcadoCor extends Model
{
    use HasFactory;
    protected $table = 'calcado_cor';
    protected $primaryKey = 'id';
    protected $fillable = [   
        'cor',
    ];

    public function Calcado(){
        return $this->hasMany('App\Models\Calcado', 'cor_id');
    }
}
