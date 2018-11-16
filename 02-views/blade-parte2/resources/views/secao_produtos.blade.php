@extends('layouts.meulayout')

@section('secao_produtos')
    Este é o texto da seção de produtos. 
    @if(isset($palavra))
        Palavra: {{$palavra}}
    @endif
@endsection
