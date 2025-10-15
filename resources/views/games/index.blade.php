<x-app-layout>
    <x-slot  name="header">
        <div class="flex justify-between">
            <h2 class="  ml-6 font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Lista de Jogos') }}
            </h2>
            <div class="mt-4">
                <a href="{{ route('games.create') }}" class="px-4 py-2 bg-gray-900 text-white rounded hover:bg-purple-900">
                    Cadastrar Novo Jogo
                </a>
            </div>
        </div>
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
                        <th class="px-4 py-2 text-left"></th>
                        <th class="px-4 py-2 text-left"></th>
                    
                        

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
                            <td class="flex gap-10 ml-12 mt-8" >
                                <a href="{{ route('games.edit', $game->id) }}" class="px-2 py-1 bg-gray-800 text-white rounded hover:bg-gray-950">Editar</a>

                                <form action="{{ route('games.destroy', $game->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este game?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-2 py-1 bg-purple-900 text-white rounded hover:bg-purple-950">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>


            </table>

        </div>
        
    </div>
</x-app-layout>
