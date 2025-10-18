<x-app-layout>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js" defer></script>

    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Cadastro de Speedruns') }}
            </h2>
        </div>
    </x-slot>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="py-12">
        <form class="flex ml-4 flex-col" action="{{ route('speedruns.store') }}" method="POST">
            @csrf

            <x-input-label for="time" :value="__('Tempo da Speedrun')" />
            <x-text-input class="w-64" id="time" name="time" :value="old('time')" />

            <x-input-label for="date" :value="__('Data')" />
            <x-text-input class="w-64" id="date" name="date" type="date" :value="old('date')" />

            <x-input-label for="mode" :value="__('Modo de jogo')" />
            <select class="w-64 text-gray-900" id="mode" name="mode">
                <option>Easy</option>
                <option>Normal</option>
                <option>Hard</option>
                <option>Others</option>
            </select>

            <x-input-label for="game_id" :value="__('Jogo')" />
            <select class="w-64" id="game_id" name="game_id">
                @foreach($games as $game)
                    <option value="{{ $game->id }}">{{ $game->titulo }}</option>
                @endforeach
            </select>

            <x-primary-button class="hover:bg-purple-800 mt-4 w-[160px]">Salvar Speedrun</x-primary-button>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            $('#time').inputmask('99:99:99', { placeholder: "hh:mm:ss" });
        });
    </script>
</x-app-layout>
