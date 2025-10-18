<x-app-layout>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Editar Speedrun') }}
            </h2>
        </div>
    </x-slot>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="py-12">
        <form class="flex ml-4 flex-col" action="{{ route('speedruns.update', $speedrun->id) }}" method="POST">

            @csrf
            @method('PUT') 

      
            <x-input-label for="time" :value="__('Tempo da Speedrun')" />
            <x-text-input class="w-64" id="time" name="time" 
                x-mask="99:99:99" 
                value="{{ old('time', $speedrun->time) }}" />


            <x-input-label for="date" :value="__('Data')" />
            <x-text-input class="w-64" id="date" name="date" 
                x-mask="99/99/9999" 
                value="{{ old('date', \Carbon\Carbon::parse($speedrun->date)->format('d/m/Y')) }}" />


            <x-input-label for="mode" :value="__('Modo de jogo')" />
            <select class="w-64 text-gray-900" id="mode" name="mode">
                <option value="Easy" {{ $speedrun->mode == 'Easy' ? 'selected' : '' }}>Easy</option>
                <option value="Normal" {{ $speedrun->mode == 'Normal' ? 'selected' : '' }}>Normal</option>
                <option value="Hard" {{ $speedrun->mode == 'Hard' ? 'selected' : '' }}>Hard</option>
                <option value="Others" {{ $speedrun->mode == 'Others' ? 'selected' : '' }}>Others</option>
            </select>

            <x-input-label for="game_id" :value="__('Jogo')" />
            <select class="w-64 text-gray-900" id="game_id" name="game_id">
                @foreach($games as $game)
                    <option value="{{ $game->id }}" 
                        {{ $speedrun->game_id == $game->id ? 'selected' : '' }}>
                        {{ $game->titulo }}
                    </option>
                @endforeach
            </select>

            <div class="flex gap-4 mt-4">
                <x-primary-button class="hover:bg-purple-800 w-[160px]">
                    Atualizar Speedrun
                </x-primary-button>

                <a href="{{ route('speedruns.index') }}" 
                   class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 text-gray-800">
                    Voltar
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
