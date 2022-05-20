<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

    Route::group(['namespace'=>'App\Http\Controllers','prefix'=>'calcados'], function(){
    Route::resource('calcado',CalcadoController::class);
    Route::resource('cor',CalcadoCorController::class);
    Route::resource('genero',CalcadogeneroController::class);
    Route::resource('marca',CalcadoMarcaController::class);
    Route::resource('tamanho',CalcadoTamanhoController::class);
    Route::resource('devolução',DevolucaoProdutosController::class);
    Route::get('estoque/minimo','EstoqueController@estoqueMinimo')->name('estoque.minimo');
    Route::resource('estoque',EstoqueController::class);   
    Route::resource('venda',VendaController::class);
    Route::resource('vendasProdutos',CalcadoCorController::class);
    Route::resource('fornecedor',FornecedorController::class);

    
    
});

