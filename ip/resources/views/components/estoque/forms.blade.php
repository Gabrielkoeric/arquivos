<form action="{{$action}}" method="post" enctype="multipart/form-data">
    @csrf
    @isset($nome)
        @method('PUT')
    @endisset
    <div class="mb-3">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" id="nome" name="nome" class="form-control" @isset($nome) value="{{$nome}}" @endisset>

        <label for="quantidadeInicial" class="form-label">Qtd. Inicial</label>
        <input type="number" id="quantidadeInicial" name="quantidadeInicial" class="form-control" @isset($quantidadeInicial) value="{{$quantidadeInicial}}" @endisset>

        <label for="quantidadeAtual" class="form-label">Qtd. Atual</label>
        <input type="number" id="quantidadeAtual" name="quantidadeAtual" class="form-control" @isset($quantidadeAtual) value="{{$quantidadeAtual}}" @endisset>

        <label for="valorCusto" class="form-label">Valor Custo</label>
        <input type="number" id="valorCusto" name="valorCusto" class="form-control" step="0.01" @isset($valorCusto) value="{{$valorCusto}}" @endisset>

        <label for="valorVenda" class="form-label">Valor Venda</label>
        <input type="number" id="valorVenda" name="valorVenda" class="form-control" step="0.01" @isset($valorVenda) value="{{$valorVenda}}" @endisset>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <label for="imagemProduto">Imagem Produto</label>
            <input type="file" id="imagemProduto" name="imagemProduto" class="form-control" accept="image/gif, image/jpeg, image/png">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="{{route('estoque.index')}}" class="btn btn-danger">Cancelar</a>
</form>
