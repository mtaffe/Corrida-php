@extends('layout.base')

@section('conteudo')

    <form action="{{ route('salvarCorredor') }}" method="post">
        {{ csrf_field() }}
    
        <div class="field">
            <label for="nome"> Nome: </label>
            <input type="text" name="nome" id="nome" />
            
            @if ($errors->has('nome'))
                @foreach ($errors->get('nome') as $erro)
                    <strong class="nome">{{ $erro }}</strong>
                @endforeach
            @endif
        </div>

        <div class="field">
            <label for="cpf"> CPF: </label>
            <input type="text" name="cpf" id="cpf" />

            @if ($errors->has('cpf'))
                @foreach ($errors->get('cpf') as $erro)
                    <strong class="cpf">{{ $erro }}</strong>
                @endforeach
            @endif
        </div>

        <div class="field">
            <label for="data_nascimento"> Data de Nascimento: </label>
            <input type="date" name="data_nascimento" id="data_nascimento" />

            @if ($errors->has('data_nascimento'))
                @foreach ($errors->get('data_nascimento') as $erro)
                    <strong class="data_nascimento">{{ $erro }}</strong>
                @endforeach
            @endif
        </div>

        <div class="btn">
            <button type="submit">Cadastrar corredor</button>
        </div>
    </form>

@endsection