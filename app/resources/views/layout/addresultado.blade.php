@extends('layout.base')

@section('title', 'Adicionar resultado')

@section('conteudo')

<div class="d-flex w-50 p-3 justify-content-center mx-auto mt-5 rounded ">
    <div class="row">
        <div class="col-sm-11 ">
            <div class="card shadow-lg p-3 mb-5 bg-body rounded border border-light">
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
                            @foreach ($provas as $provas)
                                <tr>
                                    <td>{{$provas->id}}</td>
                                    <td>{{$provas->tipo}}</td>
                                    <td>{{$provas->dia}}</td>
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
            <div class="card shadow-lg p-3 mb-5 bg-body rounded border border-light">
                <div class="card-header bg-primary text-light"><h1>Insira o seu resultado!</h1></div>
                <div class="card-body">
                        <form action="{{ route('salvarResultado') }}" method="post">
                            {{ csrf_field() }}
                            
                            <div class="row g-2">
                                <div class="col-sm-12">
                                    <div class="form-floating">
                                        <input type="corredor_id" class="form-control" id="floatingInputGrid" name="corredor_id" placeholder="corredor_id" />
                                        <label for="floatingInputGrid"> Informe o seu id: </label>
                                    
                                        @if ($errors->has('corredor_id'))
                                            @foreach ($errors->get('corredor_id') as $erro)
                                                <div class="row  mx-auto mt-1">
                                                    <div class="alert alert-danger" role="alert">    
                                                        <strong class="corredor_id">{{ $erro }}</strong>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>

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

                            <div class="row g-2 mt-1">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="time" class="form-control" name="inicio" id="floatingInputGrid" placeholder="inicio"/>
                                        <label for="floatingInputGrid"> Informe a hora de início: </label>

                                        @if ($errors->has('inicio'))
                                            @foreach ($errors->get('inicio') as $erro)
                                                <div class="row  mx-auto mt-1">
                                                    <div class="alert alert-danger" role="alert">    
                                                        <strong class="inicio">{{ $erro }}</strong>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row g-2 mt-1">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="time" class="form-control" name="chegada" id="floatingInputGrid" placeholder="inicio"/>
                                        <label for="floatingInputGrid"> Informe a hora de chegada </label>

                                        @if ($errors->has('chegada'))
                                            @foreach ($errors->get('chegada') as $erro)
                                                <div class="row  mx-auto mt-1">
                                                    <div class="alert alert-danger" role="alert">    
                                                        <strong class="chegada">{{ $erro }}</strong>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-1">
                                @if (Route::is('salvarResultado'))
                                    <div class="alert alert-success" role="alert">
                                        Resultado registrado!
                                    </div>
                                @endif
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>