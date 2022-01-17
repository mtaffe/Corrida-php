@extends('layout.base')

@section('title', 'Cadastro')

@section('conteudo')

<div class="d-flex w-50 p-3 justify-content-center mx-auto mt-5">
    <div class="row ml-5">
        <div class="col-sm-11">
            <div class="card shadow-lg p-3 mb-5 mt-3 bg-body rounded border border-light">
                <div class="card-header bg-primary text-light"><h1>Cadastrar Corredor</h1></div>
                <div class="card-body">
                    <form class="row g-3" action="{{ route('salvarCorredor') }}" method="post">
                        {{ csrf_field() }}
                        <div class="row g-2">
                            <div class="col-md">          
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInputGrid" name="nome" placeholder="Nome"/>
                                    <label for="floatingInputGrid"> Nome Completo </label>
                                    
                                    @if ($errors->has('nome'))
                                        @foreach ($errors->get('nome') as $erro)
                                            <div class="row  mx-auto mt-1">
                                                <div class="alert alert-danger" role="alert">
                                                    <strong class="cpf">{{ $erro }}</strong>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col-md">  
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="CPF" name="cpf"/>
                                    <label for="floatingInputGrid"> CPF </label>

                                    @if ($errors->has('cpf'))
                                        @foreach ($errors->get('cpf') as $erro)
                                            <div class="row  mx-auto mt-1">
                                                <div class="alert alert-danger" role="alert">
                                                    <strong class="cpf">{{ $erro }}</strong>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="date" class="form-control" name="data_nascimento" id="floatingInputGrid" placeholder="Data de Nascimento" />
                                    <label for="floatingInputGrid"> Data de Nascimento </label>

                                    
                                    @if ($errors->has('data_nascimento'))
                                        @foreach ($errors->get('data_nascimento') as $erro)
                                            <div class="row  mx-auto mt-1">
                                                <div class="alert alert-danger col-md-4 col-md-offset-4" role="alert">
                                                    <strong class="cpf">{{ $erro }}</strong>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            @if (Route::is('salvarCorredor'))
                                <div class="alert alert-success" role="alert">
                                    Corredor cadastrado com sucesso!
                                </div>
                            @endif
                            <button type="submit" class="btn btn-primary">Cadastrar corredor</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection