@extends('layout.base')

@section('title', 'Ver resultados')

@section('conteudo')

<div class="d-flex w-50 p-3 justify-content-center mx-auto mt-5 rounded ">
    <div class="row">
        <div class="col-sm-11 ">
            <div class="card shadow-lg p-3 mb-5 mt-3 bg-body rounded border border-light">
                <div class="card-header bg-primary text-light"><h1>Provas</h1></div>
                <div class="card-body">
                    <table class="table table-hover rounded">
                        <thead class="table">
                            <tr>
                                <th>Id Corrida</th>
                                <th>Tipo</th>
                                <th>dia</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prova as $prova)
                                <tr>
                                    <td>{{$prova->id}}</td>
                                    <td>{{$prova->tipo}}</td>
                                    <td>{{$prova->dia}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row ml-5">
        <div class="col-sm-11">
            <div class="card shadow-lg p-3 mb-5 mt-3 bg-body rounded border border-light">
                <div class="card-header bg-primary text-light"><h1>Escolha a prova</h1></div>
                <div class="card-body">
                    <form action="{{ route('resultado') }}" method="post">
                    {{ csrf_field() }}

                        <div class="row g-2 mt-1">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="prova_id" class="form-control" id="floatingInputGrid" name="prova_id" placeholder="prova_id"/>
                                    <label for="floatingInputGrid"> Informe o id da corrida: </label>
                        
                                    @if ($errors->has('prova_id'))
                                        @foreach ($errors->get('prova_id') as $erro)
                                            <div class="row  mx-auto mt-1">
                                                <div class="alert alert-danger" role="alert">
                                                    <strong class="prova_id">{{ $erro }}</strong>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="btn">
                            <button type="submit" class="btn btn-primary mt-1 mr-0">Ver resultados</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection