<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MensagemController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PessoaController;


Route::get('/', function () {
    return view('welcome');
});

Route::get("/mensagem/{mensagem}", [MensagemController::class, 'mostrarMensagem']);

Route::resources([
    'clientes'=> ClienteController::class,
    'pessoa'=> PessoaController::class,
    #produtos => ProdutosController::class
]);
Route::get('clientes/delete/{id}',[ClienteController::class, 'delete'])->name('cliente.delete');
Route::get('pessoa/delete/{id}',[ClienteController::class, 'delete'])->name('pessoa.delete');




