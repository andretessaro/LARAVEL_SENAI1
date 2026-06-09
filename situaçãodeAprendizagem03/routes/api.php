<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SetorApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Rotas API
Route::get('produtos',[ProdutoApiController::class, 'listarApi']);
Route::post('produto/add',[ProdutoApiController::class, 'addApi']);
Route::put('produto/atualizar/{id}',[ProdutoApiController::class, 'updateApi']);
Route::put('produto/deletar/{id}',[ProdutoApiController::class, 'delete']);