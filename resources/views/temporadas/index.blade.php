@extends('layout.layout')
@section('head')
    Temporadas
@endsection
@section('content')
    <ul class="list-group">
        @foreach ($temporadas as $temporada)
            <li class="list-group-item d-flex justify-content-between align-items-cemter">
                <a href="{{route('ep', ['id'=>$temporada->id])}}">
                    Temporada {{$temporada->numero}}
                </a>
                <span class="badge bedge-secondary">0/{{$temporada->episodios->count()}}</span>
            </li>
        @endforeach
    </ul>
@endsection