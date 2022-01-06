@extends('layout.base')

@section('conteudo')

    <form action="{{ route('salvarProvas') }}" method="post">
        {{ csrf_field() }}

        <div class="field">
            <label for="dia"> Data da prova: </label>
            <input type="date" name="dia" id="dia" />

            @if ($errors->has('dia'))
                @foreach ($errors->get('dia') as $erro)
                    <strong class="dia">{{ $erro }}</strong>
                @endforeach
            @endif
        </div>

        <div>
            <select name="tipo">
                <option value="3km">3km</option>
                <option value="5km">5km</option>
                <option value="10km">10km</option>
                <option value="21km">21km</option>
                <option value="42km">42km</option>
            </select>
        </div>

        <div class="btn">
            <button type="submit">Cadastrar prova</button>
        </div>
    </form>

@endsection