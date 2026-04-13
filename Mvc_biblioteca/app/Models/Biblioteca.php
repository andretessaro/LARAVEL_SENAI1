<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biblioteca extends Model{

    protected $fillable = [
        'nome',
        'autor',
        'numero páginas',
        'custo',
        'preco',
        'imposto',
        'editora_id',
        'detalhes_id'
    ];

    public function setor(){
        return $this->belongsTo(Setor::class);
    }

    public function detalhe(){
        return $this->belongsTo(DetalheBiblioteca::class, 'detalhes_id');
    }
}