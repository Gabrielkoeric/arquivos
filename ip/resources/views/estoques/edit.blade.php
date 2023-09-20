<x-layout title="Editar Produto '{{$estoque->nome}}'">
    <x-estoque.forms :action="route('estoque.update', ['estoque' => $estoque->id_produto_estoque])"
                        :nome="$estoque->nome"
                        :quantidadeInicial="$estoque->quantidade_inicial"
                        :quantidadeAtual="$estoque->quantidade_atual"
                        :valorCusto="$estoque->valor_custo"
                        :valorVenda="$estoque->valor_venda">
    </x-estoque.forms>
</x-layout>

<!--
"nome" => "teste"
"quantidade_inicial" => 10
"quantidade_atual" => 5
"valor_custo" => "10.00"
"valor_venda" => "15.00"
-->
