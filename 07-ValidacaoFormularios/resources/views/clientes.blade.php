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
                    <table class="table table-bordered table-hover" id="tabela">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Nome</th>
                                <th>Idade</th>
                                <th>endereço</th>
                                <th>Email</th>
                            </tr>
                        <tbody>
                            @foreach($clientes as $c)
                                <tr>
                                    <td>{{$c->id}}</td>
                                    <td>{{$c->nome}}</td>
                                    <td>{{$c->idade}}</td>
                                    <td>{{$c->endereco}}</td>
                                    <td>{{$c->email}}</td>
                                </tr>
                                @endforeach
                        </tbody>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>
</html>