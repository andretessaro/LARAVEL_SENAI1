<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SetorController;

Route::get('/', function () {
    return view('welcome');
});

// produtos
Route::get('/biblioteca/listar',[BibliotecaController::class, 'listar'])->name('biblioteca.listar');

Route::get('/biblioteca/cadastrar',[BibliotecaController::class, 'create'])->name('biblioteca.cadastro');

Route::post('/biblioteca/salvar',[BibliotecaController::class, 'add'])->name('bilioteca.salvar');

Route::get('/biblioteca/{id}/atualizar', [BibliotecaController::class, 'atualizar'])->name('biblioteca.atualizar');

Route::put('/biblioteca/{id}/update', [BibliotecaController::class, 'update'])->name('biblioteca.update');

Route::delete('/biblioteca/{id}', [BibliotecaController::class, 'deletar'])->name('biblioteca.deletar');


// setores
Route::get('/editora/cadastrar', function(){
    return view('cadastroEditora');
})->name('editora.cadastro');

Route::post('/editora/salvar',[EditoraController::class, 'add'])->name('editora.salvar');

Route::get('/editora/listar',[EditoraController::class, 'listarEditora'])->name('editora.listar');