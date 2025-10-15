<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Meus Amigos') }}
            </h2>
            <a href="{{ route('friends.create') }}" class="px-4 py-2 bg-gray-900 text-white rounded hover:bg-purple-900">
                Adicionar Amigo
            </a>
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
                        <th class="px-4 py-2 text-left">Nickname</th>
                        <th class="px-4 py-2 text-left">Bio</th>
                        <th class="px-4 py-2 text-left">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($friends as $friend)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $friend->nickname }}</td>
                            <td class="px-4 py-2 whitespace-pre-wrap">{{ $friend->bio }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('friends.edit', $friend) }}" class="text-blue-600 hover:underline">Editar</a>
                                |
                                <form action="{{ route('friends.destroy', $friend) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Tem certeza que deseja remover este amigo?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-4 py-2 text-center">Nenhum amigo cadastrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</x-app-layout>