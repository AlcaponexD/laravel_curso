<?php

use Illuminate\Database\Seeder;

class CategoriaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'nome' => 'Eletronicos'
        ]);
        DB::table('categorias')->insert([
            'nome' => 'Moveis'
        ]);
        DB::table('categorias')->insert([
            'nome' => 'Informatica'
        ]);
        DB::table('categorias')->insert([
            'nome' => 'Telefonia'
        ]);

    }
}
