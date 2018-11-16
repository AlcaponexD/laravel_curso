@extends('layouts.app')

@section('titulo', 'Minha Página')

@section('barralateral')
    @parent

    <p>Essa parte é do FILHO.</p>
    

@endsection

@section('conteudo')
    <p>Este é o conteúdo do filho.</p>
@endsection
