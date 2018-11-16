@extends('layouts.meulayout')

@section('secao_produtos')

    <h1>Loop - Foreach: </h1> 
    @foreach($produtos as $p) 
        <p>{{ $p['id'] }}: {{ $p['nome'] }} </p>
    @endforeach
    <hr>
    @foreach($produtos as $p) 
        <p>
            {{ $p['id'] }}: {{ $p['nome'] }} 
            @if ($loop->first)
                (primeiro)  
            @endif
            @if ($loop->last)
                (ultimo)  
            @endif
            <span class="badge badge-secondary">{{ $loop->index}}  / {{ $loop->count }} / {{ $loop->remaining }}</span>  
            <span class="badge badge-secondary">{{ $loop->iteration}}  / {{ $loop->count }}</span>  
        </p>
    @endforeach

@endsection
