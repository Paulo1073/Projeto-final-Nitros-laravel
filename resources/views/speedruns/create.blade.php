<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Cadastrar Speedrun') }}</h2>
    </x-slot>

    <div class="py-12">
        <form action="{{ route('speedruns.store') }}" method="POST" class="flex flex-col gap-4 ml-4">
            @csrf

            <x-input-label for="time" :value="__('Tempo da Speedrun')" />
            <x-text-input id="time" name="time" class="w-64" value="{{ old('time') }}" placeholder="hh:mm:ss" />

            <x-input-label for="date" :value="__('Data')" />
            <x-text-input id="date" name="date" type="date" class="w-64" value="{{ old('date') }}" />

            <x-input-label for="mode" :value="__('Modo de jogo')" />
            <select id="mode" name="mode" class="w-64">
                <option value="Easy">Easy</option>
                <option value="Normal">Normal</option>
                <option value="Hard">Hard</option>
                <option value="Others">Others</option>
            </select>

            <x-input-label for="game_id" :value="__('Jogo')" />
            <select id="game_id" name="game_id" class="w-64">
                @foreach($games as $game)
                    <option value="{{ $game->id }}">{{ $game->titulo }}</option>
                @endforeach
            </select>

            <x-primary-button class="w-[160px] hover:bg-purple-800">Salvar Speedrun</x-primary-button>
        </form>
    </div>
</x-app-layout>
