<x-layout title="Estoque">
    <a href="{{route('home.index')}}" class="btn btn-dark my-3 pr">Home</a>
    <a href="{{route('estoque.create')}}" class="btn btn-dark my-3">Adicionar Produto ao estoque</a>

    @isset($mensagemSucesso)
        <div class="alert alert-success">{{ $mensagemSucesso }}</div>
    @endisset
    <ul class="list-group">

            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Produto</th>
                    <th scope="col">Qtd. Inicial</th>
                    <th scope="col">Qtd. Atual</th>
                    <th scope="col">Valor Custo</th>
                    <th scope="col">Valor Venda</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($estoques as $estoque)
                    <tr>

                        <td><a href="{{ route('estoque.edit', $estoque->id_produto_estoque) }}" class="text-decoration-none text-dark"><img src="{{asset('storage/' . $estoque->imagemProduto)}}" alt="imagem" class="img-fluid"></a></td>
                        <td><a href="{{ route('estoque.edit', $estoque->id_produto_estoque) }}" class="text-decoration-none text-dark">{{ $estoque->nome }}</a></td>
                        <td><a href="{{ route('estoque.edit', $estoque->id_produto_estoque) }}" class="text-decoration-none text-dark">{{ $estoque->quantidade_inicial }}</a></td>
                        <td><a href="{{ route('estoque.edit', $estoque->id_produto_estoque) }}" class="text-decoration-none text-dark">{{ $estoque->quantidade_atual }}</a></td>
                        <td><a href="{{ route('estoque.edit', $estoque->id_produto_estoque) }}" class="text-decoration-none text-dark">{{ $estoque->valor_custo }}</a></td>
                        <td><a href="{{ route('estoque.edit', $estoque->id_produto_estoque) }}" class="text-decoration-none text-dark">{{ $estoque->valor_venda }}</a></td>
                        <td>
                        <span class="d-flex">
                            <form action="{{route('estoque.destroy', $estoque)}}" method="post" class="ms-2">
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



