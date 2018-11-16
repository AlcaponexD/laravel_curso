@extends('layouts.meulayout')

@section('secao_produtos')

    <h1>Loop - For: </h1> 
    @for($i=0; $i < $n; $i++) 
        <p>Numero {{$i}} </p>
    @endfor

@endsection
