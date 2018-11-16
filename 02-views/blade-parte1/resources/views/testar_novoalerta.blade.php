<html>
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @alerta(['tipo' => 'danger'])
        <strong>Erro:</strong> Sua mensagem de erro. 
    @endalerta

    @alerta(['tipo' => 'warning'])
        <strong>Erro:</strong> Sua mensagem de erro. 
    @endalerta

    @alerta(['tipo' => 'success'])
        <strong>Erro:</strong> Sua mensagem de erro. 
    @endalerta

    @alerta(['tipo' => 'primary'])
        <strong>Erro:</strong> Sua mensagem de erro. 
    @endalerta

    @alerta(['tipo' => 'secondary'])
        <strong>Erro:</strong> Sua mensagem de erro. 
    @endalerta

    @alerta(['tipo' => 'info'])
        <strong>Erro:</strong> Sua mensagem de erro. 
    @endalerta

    @alerta(['tipo' => 'dark'])
        <strong>Erro:</strong> Sua mensagem de erro. 
    @endalerta

    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>
</html>
