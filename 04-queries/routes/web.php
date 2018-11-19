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

////////// ********************************
use Illuminate\Support\Facades\DB;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/categorias', function () {
    //1o esse-> var_dump($cats);

    //
    $cats = DB::table('categorias')->get();
    foreach($cats as $cat) {
        echo "id: " . $cat->id . ", ";
        echo "nome: " . $cat->nome . "<br>";
    }
    echo  '<hr>';
    
    // retorna um array com todos os nomes
    $nomes = DB::table('categorias')->pluck('nome');
    foreach($nomes as $n)
        echo "$n <br>";
    echo  '<hr>';
    // retorna um array com id=1
    $cats = DB::table('categorias')->where('id',1)->get();
    foreach($cats as $cat) {
        echo "id: " . $cat->id . ", ";
        echo "nome: " . $cat->nome . "<br>";
    }
    echo  '<hr>';
    // retorna um unico elemento
    $cat = DB::table('categorias')->where('id',1)->first();
    if (isset($cat)) {
        echo "id: " . $cat->id . ", ";
        echo "nome: " . $cat->nome . "<br>";
    }
    echo  '<hr>';

    // retorna um array utilizando like 
    echo "<p>Retorna um array utilizando like</p>";
    $cats = DB::table('categorias')->where('nome','like','%p%')->get();
    foreach($cats as $cat) {
        echo "id: " . $cat->id . ", ";
        echo "nome: " . $cat->nome . "<br>";
    }
    echo  '<hr>';
    // utilizando sentença lógica 
    echo "<p>Sentenças lógicas OR</p>";
    $cats = DB::table('categorias')->where('id','1')->orWhere('id',2)->get();
    foreach($cats as $cat) {
        echo "id: " . $cat->id . ", ";
        echo "nome: " . $cat->nome . "<br>";
    }
    echo  '<hr>';
    // utilizando intervalos 
    echo "<p>utilizando intervalos</p>";
    $cats = DB::table('categorias')->whereBetween('id',[2,3])->get();
    foreach($cats as $cat) {
        echo "id: " . $cat->id . ", ";
        echo "nome: " . $cat->nome . "<br>";
    }echo  '<hr>';
    echo "<p>utilizando intervalos</p>";
    $cats = DB::table('categorias')->whereNotBetween('id',[2,3])->get();
    foreach($cats as $cat) {
        echo "id: " . $cat->id . ", ";
        echo "nome: " . $cat->nome . "<br>";
    }
    echo  '<hr>';
    // utilizando conjunto de valores 
    echo "<p>utilizando conjunto de valores</p>";
    $cats = DB::table('categorias')->whereIn('id', [1, 2, 3])->get();
    foreach($cats as $cat) {
        echo "id: " . $cat->id . ", ";
        echo "nome: " . $cat->nome . "<br>";
    }
    echo  '<hr>';
    echo "<p>utilizando conjunto de valores</p>";
    $cats = DB::table('categorias')->whereNotIn('id', [1, 2, 3])->get();
    foreach($cats as $cat) {
        echo "id: " . $cat->id . ", ";
        echo "nome: " . $cat->nome . "<br>";
    }
    echo  '<hr>';
    // order by
    echo "<p>order by nome</p>";
    $cats = DB::table('categorias')->orderBy('nome')->get();
    foreach($cats as $cat) {
        echo "id: " . $cat->id . ", ";
        echo "nome: " . $cat->nome . "<br>";
    }
    echo "<p>order by nome (desc) </p>";
    $cats = DB::table('categorias')->orderBy('nome', 'desc')->get();
    foreach($cats as $cat) {
        echo "id: " . $cat->id . ", ";
        echo "nome: " . $cat->nome . "<br>";
    }
    echo  '<hr>';
});


Route::get('/novascategorias', function () {

    //inserindo um único registro
    DB::table('categorias')->insert(
        ['nome' => 'Alimentos']
    );
    //inserindo varios
    DB::table('categorias')->insert([
        ['nome' => 'Cama, mesa e banho'], 
        ['nome' => 'Informática'], 
        ['nome' => 'Cozinha'], 
    ]);
    //recuperando id do registro inserido
    $id = DB::table('categorias')->insertGetId(
        ['nome' => 'Utensílios domésticos']
    );
    echo $id;

});


Route::get('/atualizandocategorias', function () {

    $cat = DB::table('categorias')->where('id',1)->first();
    echo "<p> Antes-> nome: " . $cat->nome . "</p>";

    //atualizando registros
    DB::table('categorias')->where('id',1)
        ->update (['nome' => 'Roupas Infantis']);

    $cat = DB::table('categorias')->where('id',1)->first();
    echo "<p> Depois-> nome: " . $cat->nome . "</p>";
});



Route::get('/apagandocategorias', function () {

    echo "<p> Antes:  </p>";
    $cats = DB::table('categorias')->get();
    foreach($cats as $cat) {
        echo "id: " . $cat->id . ", ";
        echo "nome: " . $cat->nome . "<br>";
    }

    //apagando registros
    DB::table('categorias')->where('id',1)->delete();
    DB::table('categorias')->whereNotIn('id', [1, 2, 3])->delete();

    echo "<p> Depois:  </p>";
    $cats = DB::table('categorias')->get();
    foreach($cats as $cat) {
        echo "id: " . $cat->id . ", ";
        echo "nome: " . $cat->nome . "<br>";
    }
});


