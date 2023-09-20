<x-layout title="Modelos">
    <a href="{{route('home.index')}}" class="btn btn-dark mb-2">Home</a>
    <a href="{{route('modelo.create')}}" class="btn btn-dark mb-2">Adicionar</a>

    @isset($mensagemSucesso)
        <div class="alert alert-success">{{ $mensagemSucesso }}</div>
    @endisset

    <ul class="list-group">
        @foreach ($modelos as $modelo)
            <li class="list-group-item d-flex justify-content-between align-items-center">{{$modelo->modelos_nome}}
                @csrf
                <form action="{{route('modelo.destroy', $modelo->id)}}" method="get">
                    <button class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-layout>
