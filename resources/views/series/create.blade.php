@extends('layout.layout')
@section('head')
    Series
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST">
        @csrf
        <div class="row">
            <div class="col col-8">
                <div class="form-group">
                    <label for="nome" class="label">Nome</label>
                    <input type="text" name="nome" id="nome" class="form-control mb-2">
                </div>
            </div>
            <div class="col col-2">
                <div class="form-group">
                    <label for="nome">Nº de temporadas</label>
                    <input type="number" name="qtd_temporadas" id="qtd_temporadas" class="form-control mb-2">
                </div>
            </div>
            <div class="col col-2">
                <div class="form-group">
                    <label for="nome">Nº episodios</label>
                    <input type="number" name="qtd_ep" id="qtd_ep" class="form-control mb-2">
                </div>
            </div>
        </div>
        <button class="btn btn-primary">Salvar</button>
    </form>
@endsection