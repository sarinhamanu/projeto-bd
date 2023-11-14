<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('store',
[UsuarioController::class, 'store']);

Route::get('find/{id}', [UsuarioController::class, 'pesquisaPorId']); 

Route::get('find/cpf/{cpf}', [UsuarioController::class, 'pesquisaPorcpf']);

Route::get('all',[UsuarioController::class, 'retornarTodos']);

Route::post('nome ', [UsuarioController::class, 'pesquisarPorNome']);

Route::delete('delete/{id}',[UsuarioController::class, 'excluir']); 

Route::put('update',[UsuarioController::class, 'update']);

Route::get('exportar/csv',[UsuarioController::class,'exportarCsv']);