<html>
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    @hasSection('secao_produtos')
        <div class="card" style="width: 500px; margin: 10px;">
            <div class="card-body">
                <h5 class="card-title">Produtos</h5>
                <p class="card-text">
                    @yield('secao_produtos')
                </p>
                <a href="#" class="card-link">Informações</a>
                <a href="#" class="card-link">Ajuda</a>
            </div>
        </div>
    @endif

    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

</body>
</html>

