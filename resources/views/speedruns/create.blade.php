<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl ml-2 text-purple-400 tracking-wide">
                {{ __('Speedrun Registration') }}
            </h2>
        </div>
    </x-slot>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="flex min-h-screen bg-gray-950">
      
        <div class="hidden md:block bg-center bg-cover w-[1000px] h-[570px] border-r border-gray-800 shadow-2xl"
             style="background-image: url('{{ asset('assets/images/gameroption4.png') }}');">
        </div>

        
        <div class="flex flex-col justify-center ml-[40px] mt-[20px] mb-64">
            <x-application-logo-2 class="w-[100px] h-[100px] ml-[75px] fill-current text-gray-500" />

            <form action="{{ route('speedruns.store') }}" method="POST" class="space-y-6">
                @csrf

                
                <div>
                    <x-input-label for="time" :value="__('Speedrun Time')" class="text-violet-700 mb-1" />
                    <x-text-input id="time" name="time" placeholder="hh:mm:ss" required
                        class="w-[250px] bg-gray-800 border border-purple-800/40 text-gray-100 rounded-lg 
                               focus:ring-2 focus:ring-purple-700 focus:border-purple-700" 
                        value="{{ old('time') }}" />
                    <x-input-error :messages="$errors->get('time')" class="mt-1 text-red-400 text-sm" />
                </div>

                
                <div>
                    <x-input-label for="date" :value="__('Date')" class="text-violet-700 mb-1" />
                    <x-text-input id="date" name="date" type="date" required
                        class="w-[250px] bg-gray-800 border border-purple-800/40 text-gray-100 rounded-lg 
                               focus:ring-2 focus:ring-purple-700 focus:border-purple-700"
                        value="{{ old('date') }}" />
                    <x-input-error :messages="$errors->get('date')" class="mt-1 text-red-400 text-sm" />
                </div>

                
                <div>
                    <x-input-label for="mode" :value="__('Game Mode')" class="text-violet-700 mb-1" />
                    <select id="mode" name="mode" required
                        class="w-[250px] bg-gray-800 border border-purple-800/40 text-gray-100 rounded-lg 
                               p-2 focus:ring-2 focus:ring-purple-700 focus:border-purple-700">
                        <option value="Easy" {{ old('mode') == 'Easy' ? 'selected' : '' }}>Easy</option>
                        <option value="Normal" {{ old('mode') == 'Normal' ? 'selected' : '' }}>Normal</option>
                        <option value="Hard" {{ old('mode') == 'Hard' ? 'selected' : '' }}>Hard</option>
                        <option value="Others" {{ old('mode') == 'Others' ? 'selected' : '' }}>Others</option>
                    </select>
                    <x-input-error :messages="$errors->get('mode')" class="mt-1 text-red-400 text-sm" />
                </div>

                
                <div>
                    <x-input-label for="game_id" :value="__('Game')" class="text-violet-700 mb-1" />
                    <select id="game_id" name="game_id" required
                        class="w-[250px] bg-gray-800 border border-purple-800/40 text-gray-100 rounded-lg 
                               p-2 focus:ring-2 focus:ring-purple-700 focus:border-purple-700">
                        @foreach($games as $game)
                            <option value="{{ $game->id }}" {{ old('game_id') == $game->id ? 'selected' : '' }}>
                                {{ $game->titulo }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('game_id')" class="mt-1 text-red-400 text-sm" />
                </div>

                
                <div class="flex items-center justify-between pt-6">
                    <x-primary-button
                        class="px-6 py-2 bg-gradient-to-r from-violet-700 to-violet-900 
                               hover:from-purple-700 hover:to-purple-800 text-white 
                               rounded-lg shadow-md transition-all duration-200">
                        Save
                    </x-primary-button>

                    <a href="{{ route('speedruns.index') }}" 
                       class="px-4 py-2 bg-gray-800 text-gray-300 rounded-lg 
                              hover:bg-gray-900 hover:text-white transition-colors duration-200">
                        Back
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
