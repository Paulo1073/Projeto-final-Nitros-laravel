<x-app-layout>
    <x-slot name="header">
        <h2 class="ml-6 font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Lembrete') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('reminders.update', $reminder->id) }}" method="POST" class="flex flex-col gap-4">
                @csrf
                @method('PUT')

                <x-input-label for="titulo" :value="__('Título')" />
                <x-text-input id="titulo" name="titulo" class="w-full" :value="$reminder->titulo" />

                <x-input-label for="descricao" :value="__('Descrição')" />
                <textarea id="descricao" name="descricao" rows="4" class="w-full p-2 border rounded">{{ $reminder->descricao }}</textarea>

                <x-input-label for="game_id" :value="__('Jogo')" />
                <select id="game_id" name="game_id" class="w-full p-2 border rounded">
                    @foreach($games as $game)
                        <option value="{{ $game->id }}" @selected($reminder->game_id == $game->id)>{{ $game->titulo }}</option>
                    @endforeach
                </select>

                <x-input-label for="concluido" :value="__('Concluído')" />
                <select id="concluido" name="concluido" class="w-full p-2 border rounded">
                    <option value="0" @selected(!$reminder->concluido)>Não</option>
                    <option value="1" @selected($reminder->concluido)>Sim</option>
                </select>

                <x-primary-button class=" hover:bg-purple-900 mt-4 w-[110px]">Atualizar</x-primary-button>
            </form>

        </div>
    </div>
</x-app-layout>
