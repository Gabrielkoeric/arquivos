<x-layout title="Compra">
    <a href="{{route('home.index')}}" class="btn btn-dark my-3 pr">Home</a>
    @csrf
    @isset($mensagemSucesso)
        <div class="alert alert-success">{{ $mensagemSucesso }}</div>
    @endisset

    <div>
        @foreach ($estoques as $estoque)
            <div class="card d-flex flex-column justify-content-center align-items-center p-2" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('storage/' . $estoque->imagemProduto) }}" alt="Imagem de capa do card" style="max-width: 180px; height: auto">
                <div class="card-body">
                    <h5 href="{{ route('estoque.index') }}" class="card-title" style="color: #495057">
                        {{ $estoque->nome }}
                        <div>R$: {{ $estoque->valor_venda }}</div>
                        <div class="container mt-5">
                            <div class="input-group">
                                <button class="btn btn-outline-secondary decrease" data-estoque-id="{{ $estoque->id_produto_estoque }}">-</button>
                                <input type="text" class="form-control text-center number" value="0" readonly>
                                <button class="btn btn-outline-secondary increase" data-estoque-id="{{ $estoque->id_produto_estoque }}">+</button>
                            </div>
                        </div>
                        <div class="valor-venda" data-valorvenda="{{ $estoque->valor_venda }}"></div>
                    </h5>
                </div>
            </div>
        @endforeach
    </div>
    <footer>
        <div id="total">Total: R$ 0.00</div>
        <button type="submit" class="btn btn-primary">Finalizar Pedido</button>

    </footer>
    <script>
        window.compraStoreRoute = '{{ route("compra.store") }}';
        window.csrfToken = '{{ csrf_token('enikiVJ56pv58gMeH6KFAwuVHsAULgp1FVFLQrga') }}';
    </script>

    <script src="{{ asset('js/script.js') }}"></script>
</x-layout>
