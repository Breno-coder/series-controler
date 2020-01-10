@extends('layout.layout')
@section('content')
        <div class="container">
        <div class="jumbotron">
            <h1>series</h1>
        </div>
        <a href="{{route(adicionaserie)}}" class="btn btn-dark mb-2">Adicionar</a>
        <ul class="list-group">
        @foreach($series as $serie)
            <li class="list-group-item">{{$serie}}</li>
        @endforeach
        </ul>
    </div>
@endsection

