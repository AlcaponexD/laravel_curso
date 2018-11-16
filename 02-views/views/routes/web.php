<?php

Route::get('/', function () {
    return view('welcome');
});
Route::get('/primeiraview', function() {
    return view('primeiraview');
});

Route::get('/ola', function() {
    // return view('minhaview', ['nome'=>'Joao Paulo']);
    // ou
    return view('minhaview')->with('nome','Joao')->with('sobrenome', 'Paulo');

});

Route::get('/ola/{nome}/{sobrenome}', function($nome, $sobrenome) {
    return view('minhaview', ['nome'=> $nome, 'sobrenome' => $sobrenome]);
    // ou
    // return view('minhaview', compact('nome', 'sobrenome')); esse compact monta um array assossiativo
});

Route::get('/email/{email}', function($email) {
    if (View::exists('email')) {
        return view('email', ['email'=> $email]);
    }
    else
        return view('erro');
});
