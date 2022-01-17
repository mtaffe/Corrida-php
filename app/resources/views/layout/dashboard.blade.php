@extends('layout.base')

@section('title', 'Início')

@section('conteudo')

<div class="d-flex w-50 p-3 justify-content-center mx-auto mt-5 rounded-3"> 
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
          <div class="card shadow-lg p-3 mb-5">
            <img src="{{ asset('images/corredor.jpg')}}" class="card-img-top" alt="...">
            <div class="card-body ">
                <div class="card-header"><h5 class="card-title">Cadastre-se!</h5></div>
              <p class="card-text">Faça o seu cadastro para participar das nossas provas</p>
              <a class="btn btn-primary" href={{ route('addCorredor') }} role="button">Cadastre-se</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-lg p-3 mb-5">
            <img src="{{ asset('images/prova.jpg')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <div class="card-header"><h5 class="card-title">Nova prova</h5></div>
              <p class="card-text">Crie uma nova prova seguindo os nossos critérios</p>
              <a class="btn btn-primary" href={{ route('addProvas') }} role="button">Criar prova</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-lg p-3 mb-5">
            <img src="{{ asset('images/participe.jpg')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <div class="card-header"><h5 class="card-title">Participe!</h5></div>
              <p class="card-text">Faça a sua inscrição nas nossas provas</p>
              <a class="btn btn-primary" href={{ route('participar') }} role="button">Participar</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card card shadow-lg p-3 mb-5">
            <img src="{{ asset('images/chegada.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <div class="card-header"><h5 class="card-title">Inclua o seu resultado</h5></div>
                <p class="card-text">Inclua o seu resultado para fazer parte das listas de chegada</p>
                <a class="btn btn-primary" href={{ route('addResultado') }} role="button">Incluir resultado</a>
            </div>
          </div>
        </div>
      </div>

</div>


@endsection
    


