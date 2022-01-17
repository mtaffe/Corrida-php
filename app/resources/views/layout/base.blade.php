<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>{{ config('app.name')  }} :: @yield('title')</title>
</head>
<body>

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top justify-content-center">
            <ul class="nav nav-tabs justify-content-center ">
                @if (Route::is('addCorredor'))
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('addCorredor') }}">Novo Corredor</a></li>
                @else
                <li class="nav-item"><a class="nav-link" aria-current="page" href="{{ route('addCorredor') }}">Novo Corredor</a></li>
                @endif
                @if (Route::is('addProvas'))
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('addProvas') }}">Nova Prova</a></li>
                @else 
                <li class="nav-item"><a class="nav-link" aria-current="page" href="{{ route('addProvas') }}">Nova Prova</a></li>
                @endif
                @if (Route::is('participar'))
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('participar') }}">Participar de prova</a></li>
                @else
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="{{ route('participar') }}">Participar de prova</a></li>            
                @endif
                @if (Route::is('addResultado'))
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('addResultado') }}">Adicionar resultados</a></li>
                @else
                <li class="nav-item"><a class="nav-link" aria-current="page" href="{{ route('addResultado') }}">Adicionar resultados</a></li>
                @endif
                @if (Route::is('selecionarProva'))            
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('selecionarProva') }}">Ver resultados</a></li>
                @else
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="{{ route('selecionarProva') }}">Ver resultados</a></li>
                @endif
                @if (Route::is('selecionarCategoria'))
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('selecionarCategoria') }}">Ver resultados por categoria</a></li>
                @else
                <li class="nav-item"><a class="nav-link" aria-current="page" href="{{ route('selecionarCategoria') }}">Ver resultados por categoria</a></li>
                @endif
            </ul>
        </nav>
    </div>

    @yield('conteudo')

<script src="{{ asset('jquery/jquery.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>