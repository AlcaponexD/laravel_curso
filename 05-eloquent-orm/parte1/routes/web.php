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
//base
Route::get('/', function () {
    return view('welcome');
});
//Listar todos os registros
Route::get('/listar', function () {
    $cats = Categoria::all();
    foreach($cats as $cat) {
        echo "id: " . $cat->id . ", ";
        echo "nome: " . $cat->nome . "<br>";
    }
});
//Inserir registro
Route::get('/inserir/{nome}', function ($nome) {
    $cat = new Categoria();
    $cat->nome = $nome;
    $cat->save();
    return redirect('/listar');
});

//Listar registro por id
Route::get('/ver/{id}', function ($id) {
    $cat = Categoria::find($id);
    echo "id: " . $cat->id . ", ";
    echo "nome: " . $cat->nome . "<br>";
});
//Atualizar registro elo
Route::get('/atualizar/{id}/{novonome}', function ($id, $novonome) {
    $cat = Categoria::find($id);
    $cat->nome = $novonome;
    $cat->save();
    return redirect('/listar');
});
//Apagar registro
Route::get('/apagar/{id}', function ($id) {
    $cat = Categoria::find($id);
    $cat->delete();
    return redirect('/listar');
});
//Whereeloquent
Route::get('/categoriapornome/{nome}', function ($nome){
    $categorias = Categoria::where('nome',$nome)->get();//Pode tambem usar o ->count para contar a quantidade de registros ou ->max para exibir o maior registro ou id passando o parametro ->max('id')
    foreach ($categorias as $c){
        echo "id " . $c->id;
        echo " nome " .$c->nome;
    }
});
//Procurar por maior ou maior igual , menor igual
Route::get('/categoriaporid/{id}', function ($id){
    $categorias = Categoria::where('id','>',$id)->get();
    foreach ($categorias as $c){
        echo "id " . $c->id;
        echo " nome " .$c->nome;
    }
});
//Array assossiativo  //; não precisa do metodo ->get
Route::get('/categoria123/', function (){
    $categorias = Categoria::find([1,2,3]);
    foreach ($categorias as $c){
        echo "id " . $c->id;
        echo " nome " .$c->nome;
    }
});


