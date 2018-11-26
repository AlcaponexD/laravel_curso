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

use App\Categoria; 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/listar', function () {
    $cats = Categoria::all();
    foreach($cats as $cat) {
        echo "id: " . $cat->id . ", ";
        echo "nome: " . $cat->nome . "<br>";
    }
});

Route::get('/apagar/{id}', function ($id) {
    $cat = Categoria::find($id);
    $cat->delete();
    return redirect('/listar');
});

Route::get('/listartodas', function () {
    echo "<p>Todas Categorias (incluindo apagadas)</p>";
    $cats = Categoria::withTrashed()->get();
    foreach($cats as $cat) {
        echo "id: " . $cat->id . ", ";
        echo "nome: " . $cat->nome;
        if ($cat->trashed())
            echo "  (apagada)<br> ";
        else
            echo "<br> ";
    }
});

Route::get('/ver/{id}', function ($id) {

    $cat = Categoria::find($id);
    if (isset($cat)) {
        echo "id: " . $cat->id . ", ";
        echo "nome: " . $cat->nome . "<br>";
    }
    else {
        echo "nao encontrado <br>";
    }

    $cat = Categoria::withTrashed()->where('id',$id)->get()->first();
    // $cat = Categoria::withTrashed()->find($id);
    if (isset($cat) && $cat->trashed()) {
        echo "(apagado) " . "<br>";
    }
});

Route::get('/somenteapagadas', function () {
    echo "<p>Todas Categorias APAGADAS</p>";
    $cats = Categoria::onlyTrashed()->get();
    foreach($cats as $cat) {
        echo "id: " . $cat->id . ", ";
        echo "nome: " . $cat->nome . "<br>";
    }
});

Route::get('/restaurar/{id}', function ($id) {
    $cat = Categoria::withTrashed()->find($id);
    if (isset($cat)) {
        $cat->restore();
        echo "Restaurado <br>";
        echo "<p> <a href=\"/listartodas\"> Ver todas</a></p>";
    }
    else {
        echo "Nao encontrado <br>";
    }
});


//Apagar parmanente
Route::get('/apagarpermanente/{id}', function ($id) {
    $cat = Categoria::withTrashed()->find($id);
    if (isset($cat)) {
        $cat->forceDelete();
        echo "Apagado <br>";
        echo "<p> <a href=\"/listartodas\"> Ver todas</a></p>";
    }
    else {
        echo "Nao encontrado <br>";
    }
});

//Inserir registro
Route::get('/inserir/{nome}', function ($nome) {
    $cat = new Categoria();
    $cat->nome = $nome;
    $cat->save();
    return redirect('/listar');
});


