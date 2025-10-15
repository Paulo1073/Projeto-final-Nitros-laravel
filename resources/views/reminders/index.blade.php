<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="ml-6 font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Lembretes') }}
            </h2>
            <div class="mt-4">
                <a href="{{ route('reminders.create') }}" class="px-4 py-2 bg-gray-900 text-white rounded hover:bg-purple-900">
                    Cadastrar Lembrete
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
                        <th class="px-4 py-2 text-left">Jogo</th>
                        <th class="px-4 py-2 text-left">Título</th>
                        <th class="px-4 py-2 text-left">Descrição</th>
                        <th class="px-4 py-2 text-left">Concluído</th>
                        <th class="px-4 py-2 text-left">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reminders as $reminder)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $reminder->game->titulo ?? 'Jogo não encontrado' }}</td>
                            <td class="px-4 py-2">{{ $reminder->titulo ?? '-' }}</td>
                            <td class="px-4 py-2 whitespace-pre-wrap">{{ $reminder->descricao }}</td>
                            <td class="px-4 py-2">
                                @if($reminder->concluido)
                                    <span class="text-green-600 font-semibold">Sim</span>
                                @else
                                    <span class="text-red-600 font-semibold">Não</span>
                                @endif
                            </td>
                            <td class="px-4 py-2">
                                <a href="{{ route('reminders.edit', $reminder->id) }}" class="text-blue-600 hover:underline">Editar</a>
                                |
                                <form action="{{ route('reminders.destroy', $reminder->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Deseja realmente excluir este lembrete?')">
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-2 text-center text-gray-500">
                                Nenhum lembrete encontrado.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</x-app-layout>
