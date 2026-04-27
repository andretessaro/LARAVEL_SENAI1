<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $fillable = [
        'numSala',
        'serie'
    ];

    public function turma(){
        return $this->hasMany(Turma::class);
    }
}