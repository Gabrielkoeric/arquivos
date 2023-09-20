<x-layout title="Nova Marca">
    <form action="{{route('marca.salvar')}}" method="get">
        @csrf
        <div class="mb-3 ">
            <label for="nome" class=form-label>Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>

        <a href="{{route('marca.index')}}" class="btn btn-primary">Cancelar</a>
    </form>
</x-layout>
