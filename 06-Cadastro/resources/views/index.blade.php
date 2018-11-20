@extends('layout.app',["current" => "home"])

@section('body')
    <div class="jumbotron bg-light border border-secondary">
        <div class="row">
            <div class="card-deck">
                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro de produtos</h5>
                        <p class="card-text">Aqui você cadastra todos os seus produtos , só nao esquece de cadastrar categoria</p>
                        <a href="/produtos" class="btn-primary btn">Cadastre seus produtos</a>
                    </div>
                </div>
                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro de departamentos</h5>
                        <p class="card-text">Aqui você cadastra todas as categorias</p>
                        <a href="/categorias" class="btn-primary btn">Cadastre seus produtos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection