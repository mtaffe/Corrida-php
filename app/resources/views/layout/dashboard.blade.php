@extends('layout.base')

@section('conteudo')
    
<nav>
    <ul>
        <li><a href="{{ route('addCorredor') }}">Novo Corredor</a></li>
        <li><a href="{{ route('addProvas') }}">Nova Prova</a></li>
        <li><a href="{{ route('participar') }}">Participar de prova</a></li>
        <li><a href="{{ route('addResultado') }}">Adicionar resultados</a></li>
        <li><a href="{{ route('selecionarProva') }}">Ver resultados</a></li>
        <li><a href="{{ route('selecionarCategoria') }}">Ver resultados por categoria</a></li>
    </ul>
</nav>


@endsection
    

