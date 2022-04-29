<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;
    protected $table = 'Fornecedores';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nome',
        'endereco',
        'contato',
        'telefone',
        'e-mail',
        'tipo_pessoa',
        'status'
    ];

     public function Estoque(){
        return $this->belongsTo('App\Models\Estoque', 'fornecedores_id');
    }
}