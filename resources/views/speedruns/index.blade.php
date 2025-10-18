<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="ml-6 font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Speedruns') }}
            </h2>
            <div class="mt-4">
                <a href="{{ route('speedruns.create') }}" class="px-4 py-2 bg-gray-900 text-white rounded hover:bg-purple-900">
                    Cadastrar Speedrun
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Mensagem de sucesso --}}
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Tabela de Speedruns --}}
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="px-4 py-2 text-left">Jogo</th>
                        <th class="px-4 py-2 text-left">Tempo</th>
                        <th class="px-4 py-2 text-left">Modo</th>
                        <th class="px-4 py-2 text-left">Data</th>
                        <th class="px-4 py-2 text-left">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($speedruns as $speedrun)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $speedrun->game->titulo ?? 'Jogo removido' }}</td>
                            <td class="px-4 py-2">{{ $speedrun->time }}</td>
                            <td class="px-4 py-2">{{ ucfirst($speedrun->mode) }}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($speedrun->date)->format('d/m/Y') }}</td>
                            <td class="px-4 py-2 flex gap-3">
                                <a href="{{ route('speedruns.edit', $speedrun->id) }}" 
                                   class="px-2 py-1 bg-gray-800 text-white rounded hover:bg-gray-950">
                                   Editar
                                </a>

                                <form action="{{ route('speedruns.destroy', $speedrun->id) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Tem certeza que deseja excluir esta speedrun?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-2 py-1 bg-purple-900 text-white rounded hover:bg-purple-950">
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-4 text-center text-gray-500">
                                Nenhuma speedrun registrada ainda.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
