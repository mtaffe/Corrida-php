@extends('layout.base')

@section('conteudo')

    <table>
        <thead>
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


    <form action="{{ route('addParticipacao') }}" method="post">
        {{ csrf_field() }}
        <div class="field">
            <label for="corredor_id"> Informe o seu id: </label>
            <input type="corredor_id" name="corredor_id" id="corredor_id" />
        
            @if ($errors->has('corredor_id'))
                @foreach ($errors->get('corredor_id') as $erro)
                    <strong class="corredor_id">{{ $erro }}</strong>
                @endforeach
            @endif
        </div>

        <div class="field">
            
            <div>
                <label for="prova_id"> Informe o id da corrida: </label>
                <input type="prova_id" name="prova_id" id="prova_id" />
            </div>
        
            @if ($errors->has('prova_id'))
                @foreach ($errors->get('prova_id') as $erro)
                    <strong class="prova_id">{{ $erro }}</strong>
                @endforeach
            @endif
        </div>

        <div class="btn">
            <button type="submit">Participar</button>
        </div>

    </form>
    
@endsection