<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model{

    protected $table = 'editoras'; 

    protected $fillable = [
        'nome',
        'nCorredor'
    ];

    public function editoras(){
        return $this->hasMany(Editora::class);
    }
}