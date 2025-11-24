<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl ml-6 text-primary tracking-wide">
                {{ __('Reminders Registration') }}
            </h2>
        </div>
    </x-slot>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="flex min-h-screen bg-gray-950">

        <div class="hidden md:block bg-center bg-cover w-[900px] h-[567px] border-r border-gray-900 shadow-2xl"
            style="background-image: url('{{ asset('assets/images/gameroption1.png') }}');">
        </div>

        <div class="flex flex-col justify-center ml-0 md:ml-12 mt-5 mb-64 w-full md:w-auto">

            

            <form action="{{ route('reminders.store') }}" method="POST" class="space-y-5 mt-6">
                @csrf

                <div class="flex flex-col md:flex-row gap-6">
                    <div class="flex flex-col gap-4">

                        <div>
                            <x-input-label for="titulo" :value="__('Reminder Title')" class="text-primary mb-1" />
                            <x-text-input id="titulo" name="titulo" :value="old('titulo')" required
                                class="w-[180px] bg-gray-800 border border-primary text-gray-100 rounded-lg 
                                       focus:ring-2 focus:ring-primary focus:border-primary" />
                        </div>

                        <div>
                            <x-input-label for="game_id" :value="__('Game')" class="text-primary mb-1" />
                            <select id="game_id" name="game_id" required
                                class="pl-2 w-[180px] h-8 bg-gray-800 border border-primary text-gray-100 rounded-lg 
                                       focus:ring-2 focus:ring-primary focus:border-primary">
                                @foreach($games as $game)
                                    <option value="{{ $game->id }}">{{ $game->titulo }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div>
                        <x-input-label for="descricao" :value="__('Description')" class="text-primary mb-1" />
                        <textarea id="descricao" name="descricao" rows="4"
                            class="w-[300px] h-[100px] bg-gray-800 border border-primary text-gray-100 rounded-lg p-2
                                         focus:ring-2 focus:ring-primary focus:border-primary resize-none">{{ old('descricao') }}</textarea>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row items-center justify-between pt-6 gap-4 md:gap-0">
                    <x-primary-button
                        class="px-6 py-2 bg-gray-800 text-white rounded-lg shadow-md hover:bg-gray-900 transition-all duration-200">
                        Save
                    </x-primary-button>

                    <a href="{{ route('reminders.index') }}"
                        class="px-4 py-2 bg-gray-800 text-gray-300 rounded-lg 
                              hover:bg-gray-900 hover:text-white transition-colors duration-200">
                        Back
                    </a>
                </div>

            </form>
        </div>

    </div>
</x-app-layout>
