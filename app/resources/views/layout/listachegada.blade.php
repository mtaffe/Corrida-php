@extends('layout.base')

@section('title', 'Classificação')

@section('conteudo')

<div class="d-flex w-50 p-3 justify-content-center mx-auto mt-5 rounded-3">
    <div class="row g-2">
        <div class="col-sm-11 ">
            <div class="card border border-light shadow-lg p-3 mb-5 bg-body rounded">
                <div class="card-header bg-primary text-light"><h1>Resultado</h1></div>
                <div class="card-body">
                    <table class="table table-hover rounded-3">
                        <thead class="table">
                            <tr>
                                <th>Id Prova</th>
                                <th>Tipo</th>
                                <th>Id Corredor</th>
                                <th>Data de Nascimento</th>
                                <th>Nome</th>
                                <th>Posição</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($resultado as $resultado)
                                <tr>
                                    <td>{{$resultado->prova_id}}</td>
                                    <td>{{$resultado->tipo}}</td>
                                    <td>{{$resultado->corredor_id}}</td>
                                    <td>{{$resultado->data_nascimento}}</td>
                                    <td>{{$resultado->nome}}</td>
                                    <td>{{$posicao++}}º</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a class="btn btn-primary" href={{ route('dashboard') }} role="button">Início</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection