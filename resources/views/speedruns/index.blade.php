<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl ml-6 text-purple-400 tracking-wide">
                {{ __('Speedruns') }}
            </h2>
            <a href="{{ route('speedruns.create') }}" 
               class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-violet-700 transition-colors">
                Cadastrar Speedrun
            </a>
        </div>
    </x-slot>

    <div class="min-h-screen bg-[#070707] flex flex-col">
        <div class="flex-1 bg-[#070707] pt-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="rounded-2xl shadow-2xl border border-purple-800/40 
                            bg-gradient-to-b from-gray-950 to-gray-900">

                    <div class="max-h-[500px] overflow-y-auto scrollbar-thin 
                                scrollbar-thumb-gray-700 scrollbar-track-gray-900">
                        <table class="min-w-full text-sm text-gray-200">
                            <thead class="bg-[#070707] border-b-2 border-purple-700 sticky top-0 z-10 backdrop-blur-md">
                                <tr>
                                    <th class="px-6 py-3 text-left font-semibold tracking-wider text-purple-100">Jogo</th>
                                    <th class="px-6 py-3 text-left font-semibold tracking-wider text-purple-100">Tempo</th>
                                    <th class="px-6 py-3 text-left font-semibold tracking-wider text-purple-100">Modo</th>
                                    <th class="px-6 py-3 text-left font-semibold tracking-wider text-purple-100">Data</th>
                                    <th class="pl-[90px] text-left font-semibold tracking-wider text-purple-100">Ações</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($speedruns as $speedrun)
                                    <tr class="border-b border-purple-800/30 hover:bg-purple-800/20 transition-colors duration-300">
                                        <td class="px-6 py-3 font-semibold text-white">
                                            {{ $speedrun->game->titulo ?? 'Jogo removido' }}
                                        </td>
                                        <td class="px-6 py-3 text-gray-300">
                                            {{ $speedrun->time }}
                                        </td>
                                        <td class="px-6 py-3 text-gray-300">
                                            {{ ucfirst($speedrun->mode) }}
                                        </td>
                                        <td class="px-6 py-3 text-gray-400">
                                            {{ \Carbon\Carbon::parse($speedrun->date)->format('d/m/Y') }}
                                        </td>
                                        <td class="px-6 py-3 flex items-center gap-3">
                                            <a href="{{ route('speedruns.edit', $speedrun->id) }}" 
                                               class="px-3 py-1.5 bg-gradient-to-r from-blue-700 to-blue-800 
                                                      hover:from-blue-600 hover:to-blue-700 text-white 
                                                      rounded-lg shadow-md transition-all duration-200 flex items-center gap-1">
                                                ✏️ Editar
                                            </a>

                                            <form action="{{ route('speedruns.destroy', $speedrun->id) }}" method="POST" 
                                                  onsubmit="return confirm('Deseja excluir esta speedrun?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                    class="px-3 py-1.5 bg-gradient-to-r from-purple-800 to-purple-900 
                                                           hover:from-purple-700 hover:to-purple-800 text-white 
                                                           rounded-lg shadow-md transition-all duration-200 flex items-center gap-1">
                                                    🗑️ Excluir
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-6 text-center text-gray-500 italic">
                                            Nenhuma speedrun registrada ainda.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
