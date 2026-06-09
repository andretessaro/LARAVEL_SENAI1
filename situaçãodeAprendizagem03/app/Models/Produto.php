<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Produto extends Model
{
    protected $fillable = [
       'nome',
       'tipo de materia', 
       'especificações',
       'quantidade',
       'data fabricação', 
       'preço de venda',
    ];

    public function detalhe(){
        return $this->hasMany(detalheProduto::class);
    }
}