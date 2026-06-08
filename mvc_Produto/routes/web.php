<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SetorController;
use App\Http\Controller\UserController;

Route::get('/', function () {
    return view('welcome');
});
// ROTAS DE USUARIO

Route::get('/login', function(){
    return view('login');
})->name('login');

Route::get('/autenticar', [UserController::class, 'autenticar'])->name('login.autenticar');

Route::get('/usuario/cadastrar', function(){
    return view('cadastroUsuario');
});
Route::get('/usuario/salvar', [UserController::class, 'add'])->name('usuario.salvar');

Route::get('/senha', function(){
    return view('trocarSenha');
})->name('senha.tela');

Route::post('/senha/trocar', [UserController::class, 'trocarSenha'])->name('senha.trocar'); 

Route::post('/logout', [UserController::class, 'logout'])->name('logout '); 



 Route::get('/produto/listar',[ProdutoController::class, 'listar'])
    ->name('produto.listar');

Route::middleware('auth')->group(function () {

});

Route::get('/produto/cadastrar',
    [ProdutoController::class, 'cadastro']
)->name('produto.cadastro');

// POST - enviar os dados para cadastrar usuários
Route::post('/produto/salvar', [ProdutoController::class, 'add'])
    ->name('produto.salvar');

// Tela de Atualizar
Route::get('/produto/{id}/atualizar', [ProdutoController::class, 'atualizar'])
    ->name('produto.atualizar');

Route::put('/produto/{id}/update', [ProdutoController::class, 'update'])
    ->name('produto.update');

Route::delete('/produto/{id}', [ProdutoController::class, 'deletar'])
    ->name('produto.deletar');

Route::get('/setor/cadastrar', function () {
    return view('cadastroSetor');
})->name('setor.cadastro');

Route::post('/setor/salvar', [SetorController::class, 'add'])
    ->name('setor.salvar');

Route::get('/setor/listar', [SetorController::class, 'listar'])
    ->name('setor.listar');