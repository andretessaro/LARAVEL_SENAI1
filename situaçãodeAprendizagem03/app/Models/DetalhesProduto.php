<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class detalheProduto extends Model
{
    protected $fillable = [
        'nome',
        'valor',
        'tipo de materia',
        'descricao',
        'produto_id',
    ];

    public function detalhe(){
        return $this->belongsTo(Produto::class);
    }
}