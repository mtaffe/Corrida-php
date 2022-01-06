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

    <form action="{{ route('resultadosCaegoria') }}" method="post">
        {{ csrf_field() }}
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

        <div>
            <select name="categoria">
                <option value="1">18-25 anos</option>
                <option value="2">25-35 anos</option>
                <option value="3">35-45 anos</option>
                <option value="4">45-55 anos</option>
                <option value="5">Acima de 55 anos</option>
            </select>
        </div>

        <div class="btn">
            <button type="submit">Ver resultados</button>
        </div>
    </form>

@endsection