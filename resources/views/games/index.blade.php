<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Jogos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="px-4 py-2 text-left">Imagem</th>
                        <th class="px-4 py-2 text-left">Título</th>
                        <th class="px-4 py-2 text-left">Gênero</th>
                        <th class="px-4 py-2 text-left">Plataforma</th>
                        <th class="px-4 py-2 text-left">Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($games as $game)
                        <tr class="border-b">
                            <td class="px-4 py-2">
                                <img src="{{ asset('storage/' . $game->imagem) }}" alt="{{ $game->titulo }}" class="w-20 h-20 object-cover rounded">
                            </td>
                            <td class="px-4 py-2">{{ $game->titulo }}</td>
                            <td class="px-4 py-2">{{ $game->genero }}</td>
                            <td class="px-4 py-2">{{ $game->plataforma }}</td>
                            <td class="px-4 py-2 whitespace-pre-wrap">{{ $game->descricao }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

            <div class="mt-4">
                <a href="{{ route('games.create') }}" class="px-4 py-2 bg-gray-900 text-white rounded hover:bg-purple-900">
                    Cadastrar Novo Jogo
                </a>
            </div>
        </div>
        
    </div>
</x-app-layout>
