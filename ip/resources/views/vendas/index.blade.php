<x-layout title="Vendas">
    <a href="{{ route('home.index') }}" class="btn btn-dark my-3">Home</a>
    @foreach ($compras->unique('id_compra') as $compra)
        <div class="card mb-3">
            <div class="card-header">
                Compra número: {{ $compra->id_compra }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Status: {{ $compra->status }}</h5>
                <ul class="list-group">
                    @foreach ($compras->where('id_compra', $compra->id_compra) as $produto)
                        <li class="list-group-item">{{ $produto->nome_produto }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endforeach
</x-layout>


<!--



<x-layout title="Vendas">
    <a href="{{route('home.index')}}" class="btn btn-dark my-3 pr">Home</a>
    @foreach ($compras->unique('id_compra') as $compra)
        <div>compra numero: #{{ $compra->id_compra }}</div>
        <div>status: {{$compra->status}}</div>

        <ul>
            @foreach ($compras->where('id_compra', $compra->id_compra) as $produto)
                <li>{{ $produto->nome_produto }}</li>
            @endforeach
        </ul>
    @endforeach
</x-layout>-->
