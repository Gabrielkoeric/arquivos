<x-layout title="Editar Usuario '{{$usuario->nome_completo}}'">
    <x-usuario.forms :action="route('usuario.update', $usuario)"
                        :nome="$usuario->nome_completo"
                        :email="$usuario->email"
                        :celular="$usuario->celular"
                        :permissao="$usuario->permissao"
    >
    </x-usuario.forms>
</x-layout>

