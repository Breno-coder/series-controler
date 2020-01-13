@extends('layout.layout')
@section('head')
    Episodios
@endsection
@section('content')
    <form action="" method="post">
    <ul class="list-group">
        @foreach ($episodios as $episodio)
            <li class="list-group-item d-flex justify-content-between align-items-cemter">
                    Episodio {{$episodio->numero}}
                <input type="checkbox" name="" id="">
            </li>
        @endforeach
    </ul>
    <button class="btn btn-primary mr-1">Salvar</button>
    </form>
@endsection