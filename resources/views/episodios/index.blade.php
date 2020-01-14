@extends('layout.layout')
@section('head')
    Episodios
@endsection
@section('content')
    <form method="post" action="{{ route('sesson', ['temporada'=>$episodios->id]) }}" >
        @csrf
    <ul class="list-group">
        @foreach ($episodios as $episodio)
            <li class="list-group-item d-flex justify-content-between align-items-cemter">
                    Episodio {{$episodio->numero}}
                <input type="checkbox" name="episodios[]" id="episodios[]" value="{{$episodio->id}}">
            </li>
        @endforeach
    </ul>
    <button class="btn btn-primary mt-2 mb-2">Salvar</button>
    </form>
@endsection