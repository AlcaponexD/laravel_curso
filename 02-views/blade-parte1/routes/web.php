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
    return view('filho');
});

Route::get('/meucomponente', function () {
    return view('meucomponente');
});

Route::get('/novoalerta', function () {
    return view('testar_novoalerta');
});

Route::get('/pagina', function (){
    return view('pagina');
});