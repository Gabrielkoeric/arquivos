<x-layout title="Home">
    <div class="d-flex gap">
        <a href="{{route('usuario.index')}}" class="text-decoration-none me-4">
            <div class="card d-flex flex-column justify-content-center align-items-center p-2" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('storage/home/users.png') }}" alt="Imagem de capa do card" style="max-width: 50px; height: auto">
                <div class="card-body">
                    <h5
                        href="{{route('usuario.index')}}"
                        class="card-title text-decoration-none"
                        style="color: #495057"
                    >
                        Usuarios
                    </h5>
                </div>
            </div>
        </a>

        <a href="{{route('estoque.index')}}" class="text-decoration-none">
            <div class="card d-flex flex-column justify-content-center align-items-center p-2" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('storage/home/estoque.png') }}" alt="Imagem de capa do card" style="max-width: 50px; height: auto">
                <div class="card-body">
                    <h5
                        href="{{route('estoque.index')}}"
                        class="card-title"
                        style="color: #495057"
                    >
                        Estoque
                    </h5>
                </div>
            </div>
        </a>

        <a href="{{route('compra.index')}}" class="text-decoration-none">
            <div class="card d-flex flex-column justify-content-center align-items-center p-2" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('storage/home/fazerCompras.png') }}" alt="Imagem de capa do card" style="max-width: 50px; height: auto">
                <div class="card-body">
                    <h5
                        href="{{route('compra.index')}}"
                        class="card-title"
                        style="color: #495057"
                    >
                        Compras
                    </h5>
                </div>
            </div>
        </a>

        <a href="{{route('vendas.index')}}" class="text-decoration-none">
            <div class="card d-flex flex-column justify-content-center align-items-center p-2" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('storage/home/minhasVendas.png') }}" alt="Imagem de capa do card" style="max-width: 50px; height: auto">
                <div class="card-body">
                    <h5
                        href="{{route('vendas.index')}}"
                        class="card-title"
                        style="color: #495057"
                    >
                        Vendas (adm)
                    </h5>
                </div>
            </div>
        </a>

        <a href="{{route('pedidos.index')}}" class="text-decoration-none">
            <div class="card d-flex flex-column justify-content-center align-items-center p-2" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('storage/home/minhasCompras.png') }}" alt="Imagem de capa do card" style="max-width: 50px; height: auto">
                <div class="card-body">
                    <h5
                        href="{{route('pedidos.index')}}"
                        class="card-title"
                        style="color: #495057"
                    >
                        Pedidos (usuario final)
                    </h5>
                </div>
            </div>
        </a>

        <a href="{{route('produtos.index')}}" class="text-decoration-none">
            <div class="card d-flex flex-column justify-content-center align-items-center p-2" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('storage/home/produtos.png') }}" alt="Imagem de capa do card" style="max-width: 50px; height: auto">
                <div class="card-body">
                    <h5
                        href="{{route('produtos.index')}}"
                        class="card-title"
                        style="color: #495057"
                    >
                        Produtos
                    </h5>
                </div>
            </div>
        </a>
    </div>
</x-layout>
