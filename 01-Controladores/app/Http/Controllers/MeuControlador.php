<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeuControlador extends Controller
{
    public function getNome(){
        return "Jeison";
    }
    public function getIdade()
    {
        return "20 anos";
    }
    public function multiplicar($n1,$n2)
    {
        return $n1*$n2;
    }
    public function getNomePorId($id)
    {
        $v = ["teste1", "teste2", "teste3", "teste4"];
        if ($id >= 0 && $id <count($v) )
            return $v[$id];
        return"Nada encontrado";
    }
}
