<?php

use App\Http\Controllers\NivelAcessoController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/nivel-acesso/cadastro',[NivelAcessoController::class, 'cadastro'])
->name('nivel-acesso.cadastro');
Route::post('/nível-acesso/salvar', [NívelAcessoController::class, 'add'])
->name('nível-acesso.salvar');
Route::get('/nivel-acesso/listar', [NivelAcessoController::class, 'listar'])
->name('nivel-acesso.listar');
Route::delete('/nivel-acesso/deletar', [NivelAcessoController::class, 'deletar'])
->name('nivel-acesso.deletar');
Route::get('/nivel-acesso/atualizar/{id}', [NivelAcessoController::class, 'atualizar'])
->name('nivel-acesso.atualizar');
Route::put('/nivel-acesso/update/{id}', [NivelAcessoController::class, 'update'])
->name('nivel-acesso.update');


// Rotas do usuário
Route::get('/usuario/update/{id}', [NivelAcessoController::class, 'usuario'])
->name('usuario.update');

Route::get('/usuarios/listar', [UsuariosController::class, 'listar'])
->name('usuarios.listar');


Route::get('/usuarios/deletar/{id}', [UsuariosController::class, 'deletar'])
->name('usuarios.deletar');

Route::get(' /usuarios/atualizar/{id}', [UsuariosController::class, 'atualizar'])->name('usuarios.atualizar');