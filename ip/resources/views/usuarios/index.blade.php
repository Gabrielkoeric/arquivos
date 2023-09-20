<x-layout title="Usuarios">
    <a href="{{route('home.index')}}" class="btn btn-dark mb-2">Home</a>
    <a href="{{route('usuario.create')}}" class="btn btn-dark mb-2">Adicionar</a>

    @isset($mensagemSucesso)
        <div class="alert alert-success">{{ $mensagemSucesso }}</div>
    @endisset
    <ul class="list-group">

            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Celular</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td><a href="{{ route('usuario.edit', $usuario->id ) }}" class="text-decoration-none text-dark">{{ $usuario->nome_completo }}</a></td>
                        <td><a href="{{ route('usuario.edit', $usuario->id) }}" class="text-decoration-none text-dark">{{ $usuario->email }}</a></td>
                        <td><a href="{{ route('usuario.edit', $usuario->id) }}" class="text-decoration-none text-dark">{{ $usuario->celular }}</a></td>
                        <td>
                        <span class="d-flex">
                            <form action="{{route('usuario.destroy', $usuario)}}" method="post" class="ms-2">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </span>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

    </ul>
</x-layout>



