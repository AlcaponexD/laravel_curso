<html>
<head>
    <!--link href="{{ URL::to('css/app.css') }}" rel="stylesheet"-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <!-- acrescentar parametro: ['titulo' => 'Erro fatal', 'nome'=>'Joao' ] -->
    @component('componente_alerta')

    <!-- 
      Any content not within a slot directive 
      will be passed to the component in the slot variable. 
    -->
    <!--
        @slot('titulo')
            Erro fatal 
        @endslot
    -->

        <strong>Erro:</strong> Sua mensagem de erro. 
    @endcomponent

    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <!--script src="{{ URL::to('js/app.js') }}" type="text/javascript"></script-->

</body>
</html>
