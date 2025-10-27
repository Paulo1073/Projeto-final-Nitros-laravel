<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl ml-2 text-purple-400 tracking-wide">
                {{ __('Editar Speedrun') }}
            </h2>
        </div>
    </x-slot>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="flex min-h-screen bg-gray-950">
        
        <!-- Imagem lateral -->
        <div class="hidden md:block bg-center bg-cover w-[1000px] h-[570px] border-r border-gray-800 shadow-2xl"
             style="background-image: url('{{ asset('assets/images/gameroption4.png') }}');">
        </div>

        <!-- Formulário -->
        <div class="flex flex-col justify-center ml-32 mt-[20px] mb-64">
            <x-application-logo-2 class="w-[100px] h-[100px] ml-[75px] fill-current text-gray-500" />

            <form action="{{ route('speedruns.update', $speedrun->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Tempo -->
                <div>
                    <x-input-label for="time" :value="__('Tempo da Speedrun')" class="text-violet-700 mb-1" />
                    <x-text-input id="time" name="time" placeholder="hh:mm:ss" required
                        class="w-[250px] bg-gray-800 border border-purple-800/40 text-gray-100 rounded-lg 
                               focus:ring-2 focus:ring-purple-700 focus:border-purple-700"
                        value="{{ old('time', $speedrun->time) }}" />
                    <x-input-error :messages="$errors->get('time')" class="mt-1 text-red-400 text-sm" />
                </div>

                <!-- Data -->
                <div>
                    <x-input-label for="date" :value="__('Data')" class="text-violet-700 mb-1" />
                    <x-text-input id="date" name="date" type="date" required
                        class="w-[250px] bg-gray-800 border border-purple-800/40 text-gray-100 rounded-lg 
                               focus:ring-2 focus:ring-purple-700 focus:border-purple-700"
                        value="{{ old('date', $speedrun->date->format('Y-m-d')) }}" />
                    <x-input-error :messages="$errors->get('date')" class="mt-1 text-red-400 text-sm" />
                </div>

                <!-- Modo -->
                <div>
                    <x-input-label for="mode" :value="__('Modo de jogo')" class="text-violet-700 mb-1" />
                    <select id="mode" name="mode" required
                        class="w-[250px] bg-gray-800 border border-purple-800/40 text-gray-100 rounded-lg 
                               p-2 focus:ring-2 focus:ring-purple-700 focus:border-purple-700">
                        <option value="Easy" {{ $speedrun->mode == 'Easy' ? 'selected' : '' }}>Easy</option>
                        <option value="Normal" {{ $speedrun->mode == 'Normal' ? 'selected' : '' }}>Normal</option>
                        <option value="Hard" {{ $speedrun->mode == 'Hard' ? 'selected' : '' }}>Hard</option>
                        <option value="Others" {{ $speedrun->mode == 'Others' ? 'selected' : '' }}>Others</option>
                    </select>
                    <x-input-error :messages="$errors->get('mode')" class="mt-1 text-red-400 text-sm" />
                </div>

                <!-- Jogo -->
                <div>
                    <x-input-label for="game_id" :value="__('Jogo')" class="text-violet-700 mb-1" />
                    <select id="game_id" name="game_id" required
                        class="w-[250px] bg-gray-800 border border-purple-800/40 text-gray-100 rounded-lg 
                               p-2 focus:ring-2 focus:ring-purple-700 focus:border-purple-700">
                        @foreach($games as $game)
                            <option value="{{ $game->id }}" {{ $speedrun->game_id == $game->id ? 'selected' : '' }}>
                                {{ $game->titulo }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('game_id')" class="mt-1 text-red-400 text-sm" />
                </div>

                <!-- Botões -->
                <div class="flex items-center justify-between pt-6">
                    <x-primary-button
                        class="px-6 py-2 bg-gradient-to-r from-violet-700 to-violet-900 
                               hover:from-purple-700 hover:to-purple-800 text-white 
                               rounded-lg shadow-md transition-all duration-200">
                        Atualizar Speedrun
                    </x-primary-button>

                    <a href="{{ route('speedruns.index') }}" 
                       class="px-4 py-2 bg-gray-800 text-gray-300 rounded-lg 
                              hover:bg-gray-900 hover:text-white transition-colors duration-200">
                        Voltar
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
