<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl ml-6 text-primary tracking-wide">
                {{ __('Games') }}
            </h2>
            <a href="{{ route('games.create') }}"
                class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-900 transition-colors">
                Add Game
            </a>
        </div>
    </x-slot>

    <div class="min-h-screen bg-[#070707] flex flex-col">
        <div class="flex-1 pt-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="rounded-2xl shadow-2xl border border-primary  bg-gradient-to-b  from-gray-950 to-gray-900">
                    <div class="max-h-[500px] overflow-y-auto scrollbar-thin scrollbar-thumb-gray-700 scrollbar-track-gray-900">
                        <table class="min-w-full text-sm text-gray-200">
                            <thead class="bg-[#070707] border-b-2 border-primary sticky top-0 z-10 backdrop-blur-md">
                                <tr>
                                    <th class="px-6 py-3 text-left font-semibold tracking-wider text-primary">Image</th>
                                    <th class="px-6 py-3 text-left font-semibold tracking-wider text-primary">Title</th>
                                    <th class="px-6 py-3 text-left font-semibold tracking-wider text-primary">Gender</th>
                                    <th class="pr-10 text-left font-semibold tracking-wider text-primary">Plataform</th>
                                    <th class="pl-3 text-left font-semibold tracking-wider text-primary">Description</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($games as $game)
                                    <tr class="border-b border-primary hover:bg-primary transition-colors duration-300">
                                        <td class="px-6 py-3">
                                            <img src="{{ asset('storage/' . $game->imagem) }}" alt="{{ $game->titulo }}"
                                                class="w-16 h-16 rounded-lg object-cover shadow-md border border-primary">
                                        </td>
                                        <td class="px-6 py-3  font-semibold text-white">{{ $game->titulo }}</td>
                                        <td class="px-6 py-3 text-gray-300">{{ $game->genero }}</td>
                                        <td class="px-6 py-3 text-gray-300">{{ $game->plataforma }}</td>
                                        <td class="px-6 py-3 text-gray-400 whitespace-pre-wrap">{{ $game->descricao }}</td>
                                        <td class="px-6 py-3 flex items-center mt-4 gap-3">
                                            <a href="{{ route('games.edit', $game->id) }}"
                                                class="px-3 py-1.5 bg-gradient-to-r from-blue-700 to-blue-800 hover:from-blue-600 hover:to-blue-700 text-white rounded-lg shadow-md transition-all duration-200 flex items-center gap-1">
                                                ✏️ Edit
                                            </a>
                                            <form action="{{ route('games.destroy', $game->id) }}" method="POST"
                                                onsubmit="return confirm('Tem certeza que deseja excluir este game?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-3 py-1.5  bg-red-800 hover:bg-red-700 text-white rounded-lg shadow-md transition-all duration-200 flex items-center gap-1">
                                                    🗑️ Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="px-6 py-6 text-center text-gray-500 italic">No games found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('assets/js/color.js') }}"></script>
    </div>
</x-app-layout>
