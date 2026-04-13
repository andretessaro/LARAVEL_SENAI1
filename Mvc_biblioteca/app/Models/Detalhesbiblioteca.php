<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalheProduto extends Model{

    protected $table = 'detalhesProduto';

    protected $fillable = [
        'descrição',
        'numero páginas',
        'peso',
        'data publicação',
    ];

    public function bibliotecas(){
        return $this->hasMany(Biblioteca::class);
    }
}