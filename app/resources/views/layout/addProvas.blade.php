@extends('layout.base')

@section('title', 'Nova Prova')

@section('conteudo')

<div class="d-flex w-50 p-3 justify-content-center mx-auto mt-5">
    <div class="row ml-5">
        <div class="col-sm-11">
            <div class="card shadow-lg p-3 mb-5 mt-3 bg-body rounded border border-light">
                <div class="card-header bg-primary text-light"><h1>Nova prova</h1></div>
                <div class="card-body">
                    <form class="row g-3" action="{{ route('salvarProvas') }}" method="post">
                        {{ csrf_field() }}
                        <div class="row g-2">
                            <div class="col-md">  
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="floatingInputGrid" placeholder="dia" name="dia"/>
                                    <label for="floatingInputGrid"> Data da prova: </label>

                                    @if ($errors->has('dia'))
                                        @foreach ($errors->get('dia') as $erro)
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
                                    <select class="form-select" name="tipo">
                                        <option value="3km">3km</option>
                                        <option value="5km">5km</option>
                                        <option value="10km">10km</option>
                                        <option value="21km">21km</option>
                                        <option value="42km">42km</option>
                                    </select>
                                    <label for="form-select">Tipo de prova</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            @if (Route::is('salvarProvas'))
                                <div class="alert alert-success" role="alert">
                                    Prova cadastrada com sucesso!
                                </div>
                            @endif
                            
                            <button type="submit" class="btn btn-primary">Cadastrar prova</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection