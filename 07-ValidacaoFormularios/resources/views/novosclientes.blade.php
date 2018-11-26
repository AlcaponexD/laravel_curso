<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cadastro novo cliente</title>
</head>
<body>
    <main role="main">
        <div class="row">
            <div class="container col-sm-8 offset-md-2">
                <div class="card border">
                    <div class="card-header">
                        <div class="card-title">
                            Cadastro de cliente
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/cliente" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="nome">Nome do cliente</label>
                                <input type="text" id="nome" class="form-control" name="nome" placeholder="Nome do Cliente">
                            </div>
                            <div class="form-group">
                                <label for="idade">Idade do cliente</label>
                                <input type="number" id="idade" class="form-control" name="idade" placeholder="Idade do Cliente">
                            </div>
                            <div class="form-group">
                                <label for="endereco">Endereco do cliente</label>
                                <input type="text" id="endereco" name="endereco" class="form-control" placeholder="Endereco do Cliente">
                            </div>
                            <div class="form-group">
                                <label for="email">Email do cliente</label>
                                <input type="text" id="email" name="email"  class="form-control" placeholder="Email do Cliente">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                            <button type="reset" class="btn btn-danger btn-sm">Cancelar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @if(isset($errors))
        {{var_dump($errors)}}
        @endif
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>
</html>