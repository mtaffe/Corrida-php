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
            @foreach ($provas as $provas)
                <tr>
                    <td>{{$provas->id}}</td>
                    <td>{{$provas->tipo}}</td>
                    <td>{{$provas->dia}}</td>
                </tr>
                
            @endforeach
        </tbody>
    </table>

    <form action="{{ route('salvarResultado') }}" method="post">
        {{ csrf_field() }}
        
        <div class="field">
            <label for="corredor_id"> Informe o seu id: </label>
            <input type="text" name="corredor_id" id="corredor_id" />
        
            @if ($errors->has('corredor_id'))
                @foreach ($errors->get('corredor_id') as $erro)
                    <strong class="corredor_id">{{ $erro }}</strong>
                @endforeach
            @endif
        </div>

        <div class="field">
            
            <div>
                <label for="prova_id"> Informe o id da corrida: </label>
                <input type="text" name="prova_id" id="prova_id" />
            </div>
        
            @if ($errors->has('prova_id'))
                @foreach ($errors->get('prova_id') as $erro)
                    <strong class="prova_id">{{ $erro }}</strong>
                @endforeach
            @endif
        </div>

        <div class="field">
            <div>
                <label for="inicio"> Informe a hora de início: </label>
                <input type="time" name="inicio" id="inicio" />
            </div>
    
            @if ($errors->has('inicio'))
                @foreach ($errors->get('inicio') as $erro)
                    <strong class="inicio">{{ $erro }}</strong>
                @endforeach
            @endif
        </div>

        <div class="field">
            <div>
                <label for="chegada"> Informe a hora de chegada </label>
                <input type="time" name="chegada" id="chegada" />
            </div>
    
            @if ($errors->has('chegada'))
                @foreach ($errors->get('chegada') as $erro)
                    <strong class="chegada">{{ $erro }}</strong>
                @endforeach
            @endif
        </div>

        <div class="btn">
            <button type="submit">Incluir resultado</button>
        </div>

    </form>