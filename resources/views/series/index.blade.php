@extends('layout.layout')
@section('head')
    Series
@endsection
@section('content')
    @if (!@empty($mensagem))
        <div class="alert alert-success">
            {{$mensagem}}
        </div>
    @endif
        <a href="{{route('adicionaserie')}}" class="btn btn-dark mb-2">Adicionar</a>
        <ul class="list-group">
        @foreach($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-item-center">
                
                <span id="nome-serie-{{ $serie->id }}">{{ $serie->nome }}</span>
                <div class="input-group w-50" hidden id="input-nome-serie-{{ $serie->id }}">
                    <input type="text" class="form-control" value="{{ $serie->nome }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary mr-1" onclick="editarserie({{ $serie->id }})">
                                <i class="fas fa-check"></i>
                            </button>
                            @csrf
                        </div>
                </div>

                <span class="d-flex">
                    <button class="btn btn-info btn-sm mr-1" onclick="toggleinput({{$serie->id}})">
                        <i class="fas fa-edit"></i>
                    </button>
                    <a href="{{route('temporadas', ['id'=>$serie->id])}}" class="btn btn-info btn-sm mr-1">
                        <i class="fas fa-external-link-alt"></i>
                    </a>
                    <form method="post" action="{{route('remover',['id'=>$serie->id])}}" onsubmit="return confirm('Tem certeza que deseja remover a serie {{addslashes($serie->nome)}}?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </span>
            </li>
        @endforeach
        </ul>
        <script>
            function toggleinput(id) {
            const nomeserie = document.getElementById(`nome-serie-${id}`);
            const inputserie = document.getElementById(`input-nome-serie-${id}`);
                if (document.getElementById(`nome-serie-${id}`).hasAttribute('hidden')) {
                    nomeserie.removeAttribute('hidden');
                    inputserie.hidden = true;
                } else {
                    inputserie.removeAttribute('hidden');
                    nomeserie.hidden = true;
                }
            }

            function editarserie(id) {
                let formData = new FormData();
                const token = document.querySelector(`input[name="_token"]`).value;
                const nome = document.querySelector(`#input-nome-serie-${id} > input`).value;
                const url = `/editar/${id}`;
                formData.append('nome', nome)
                formData.append('_token', token);
                fetch(url, {
                    body: formData,
                    method: 'POST'
                }).then(() => {
                    toggleinput(id);
                    document.getElementById(`nome-serie-${id}`).textContent = nome;
                });
            }
        </script>
@endsection

