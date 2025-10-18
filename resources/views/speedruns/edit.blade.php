<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Editar Speedrun') }}</h2>
    </x-slot>

    <div class="py-12">
        <form action="{{ route('speedruns.update', $speedrun->id) }}" method="POST" class="flex flex-col gap-4 ml-4">
            @csrf
            @method('PUT')

            <x-input-label for="time" :value="__('Tempo da Speedrun')" />
            <x-text-input id="time" name="time" class="w-64" value="{{ old('time', $speedrun->time) }}" />

            <x-input-label for="date" :value="__('Data')" />
            <x-text-input id="date" name="date" type="date" class="w-64" value="{{ old('date', $speedrun->date->format('Y-m-d')) }}" />


            <x-input-label for="mode" :value="__('Modo de jogo')" />
            <select id="mode" name="mode" class="w-64">
                <option value="Easy" {{ $speedrun->mode == 'Easy' ? 'selected' : '' }}>Easy</option>
                <option value="Normal" {{ $speedrun->mode == 'Normal' ? 'selected' : '' }}>Normal</option>
                <option value="Hard" {{ $speedrun->mode == 'Hard' ? 'selected' : '' }}>Hard</option>
                <option value="Others" {{ $speedrun->mode == 'Others' ? 'selected' : '' }}>Others</option>
            </select>

            <x-input-label for="game_id" :value="__('Jogo')" />
            <select id="game_id" name="game_id" class="w-64">
                @foreach($games as $game)
                    <option value="{{ $game->id }}" {{ $speedrun->game_id == $game->id ? 'selected' : '' }}>
                        {{ $game->titulo }}
                    </option>
                @endforeach
            </select>

            <div class="flex gap-4 mt-4">
                <x-primary-button class="w-[160px] hover:bg-purple-800">Atualizar Speedrun</x-primary-button>
                <a href="{{ route('speedruns.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 text-gray-800">Voltar</a>
            </div>
        </form>
    </div>
</x-app-layout>
