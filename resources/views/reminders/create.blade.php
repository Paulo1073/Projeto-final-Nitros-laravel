<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between " >
            <h2 class="font-semibold text-xl  text-gray-800 leading-tight">
                {{ __('Cadastro de Jogos') }}
            </h2>
            
        </div>
    </x-slot>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
    <div class="py-12">
        <form  class="flex ml-4 flex-col" action="{{ route('reminders.store') }}" method="POST">
            @csrf

            <x-input-label for="titulo" :value="__('Título do Lembrete')" />
            <x-text-input class="w-64" id="titulo" name="titulo" :value="old('titulo')" />

            <x-input-label for="descricao" :value="__('Descrição')" />
            <textarea class="w-64" id="descricao" name="descricao" rows="4" class="w-full p-2">{{ old('descricao') }}</textarea>

            <x-input-label for="game_id" :value="__('Jogo')" />
            <select class="w-64" id="game_id" name="game_id" class="w-full p-2">
                @foreach($games as $game)
                    <option value="{{ $game->id }}">{{ $game->titulo }}</option>
                @endforeach
            </select>

            <x-primary-button class=" hover:bg-purple-800  mt-4 w-[160px]">Salvar Lembrete</x-primary-button>
        </form>

    </div>
</x-app-layout>