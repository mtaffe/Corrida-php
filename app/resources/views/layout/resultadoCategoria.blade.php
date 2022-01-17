@extends('layout.base')

@section('title', 'Categorias')

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
                <div class="card-header bg-primary text-light"><h1>Escolha uma prova</h1></div>
                <div class="card-body">
                    <form action="{{ route('resultadosCaegoria') }}" method="post">
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

                        <div class="row g-2 mt-1">
                            <div class="col-md">
                                <div class="form-floating">
                                    <select class="form-select" name="categoria">
                                        <option value="1">18-25 anos</option>
                                        <option value="2">25-35 anos</option>
                                        <option value="3">35-45 anos</option>
                                        <option value="4">45-55 anos</option>
                                        <option value="5">Acima de 55 anos</option>
                                    </select>
                                    <label for="form-select">Categoria</label>
                                </div>

                                <div class="btn">
                                    <button type="submit" class="btn btn-primary">Ver resultados</button>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection