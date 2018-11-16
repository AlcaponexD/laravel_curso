<?php

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

Route::get('/produtos', 'ProdutoControlador@listar');

Route::get('/secaoprodutos/{palavra}', 'ProdutoControlador@secao_produtos');

Route::get('/mostraropcoes', 'ProdutoControlador@mostrar_opcoes');

Route::get('/opcoes/{opcao}', 'ProdutoControlador@opcoes');

Route::get('/loop/for/{n}', function($n) {
    return view('loop_for', compact('n'));
});

Route::get('/loop/foreach', function() {
    $produtos = [ 
        [ "id" => 1, "nome" => "computador" ],
        [ "id" => 2, "nome" => "mouse" ],
        [ "id" => 3, "nome" => "impressora" ],
        [ "id" => 4, "nome" => "monitor" ],
        [ "id" => 5, "nome" => "teclado" ],
    ];
    return view('loop_foreach', compact('produtos'));
});


