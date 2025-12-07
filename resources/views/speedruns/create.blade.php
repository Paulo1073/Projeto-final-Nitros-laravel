<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl ml-2 text-primary tracking-wide">
                {{ __('Speedrun Registration') }}
            </h2>
        </div>
    </x-slot>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="flex min-h-screen bg-gray-950">
        <div class="hidden md:block bg-center bg-cover w-[900px] h-[567px] border-r border-primary shadow-2xl"
            style="background-image: url('{{ asset('assets/images/gameroption4.png') }}');"></div>

        <div class="flex flex-col justify-center ml-0 md:ml-[40px] mt-[20px] mb-64">

            <form action="{{ route('speedruns.store') }}" method="POST" class="space-y-6 mt-6" x-data>
                @csrf

                <div>
                    <x-input-label for="time" :value="__('Speedrun Time')" class="text-primary mb-1" />
                    <x-text-input 
                        id="time" 
                        name="time" 
                        placeholder="hh:mm:ss" 
                        
                        x-on:input="
                            let v = $el.value.replace(/[^0-9]/g, '').slice(0,6);
                            if(v.length >= 2) v = v.slice(0,2) + ':' + v.slice(2);
                            if(v.length >= 5) v = v.slice(0,5) + ':' + v.slice(5);
                            $el.value = v;
                        "
                        class="w-[250px] bg-gray-800 border border-primary text-gray-100 rounded-lg 
                        focus:ring-2 focus:ring-primary focus:border-primary"
                        value="{{ old('time') }}" />
                    <x-input-error :messages="$errors->get('time')" class="mt-1 text-red-400 text-sm" />
                </div>

                <div>
                    <x-input-label for="date" :value="__('Date')" class="text-primary mb-1" />
                    <x-text-input id="date" name="date" type="date" 
                        class="w-[250px] bg-gray-800 border border-primary text-gray-100 rounded-lg 
                        focus:ring-2 focus:ring-primary focus:border-primary"
                        value="{{ old('date') }}" />
                    <x-input-error :messages="$errors->get('date')" class="mt-1 text-red-400 text-sm" />
                </div>

                <div>
                    <x-input-label for="mode" :value="__('Game Mode')" class="text-primary mb-1" />
                    <select id="mode" name="mode" 
                        class="w-[250px] bg-gray-800 border border-primary text-gray-100 rounded-lg p-2 focus:ring-2 focus:ring-primary focus:border-primary">
                        <option value="Easy">Easy</option>
                        <option value="Normal">Normal</option>
                        <option value="Hard">Hard</option>
                        <option value="Others">Others</option>
                    </select>
                    <x-input-error :messages="$errors->get('mode')" class="mt-1 text-red-400 text-sm" />
                </div>

                <div>
                    <x-input-label for="game_id" :value="__('Game')" class="text-primary mb-1" />
                    <select id="game_id" name="game_id" 
                        class="w-[250px] bg-gray-800 border border-primary text-gray-100 rounded-lg p-2 focus:ring-2 focus:ring-primary focus:border-primary">
                        @foreach($games as $game)
                            <option value="{{ $game->id }}">{{ $game->titulo }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('game_id')" class="mt-1 text-red-400 text-sm" />
                </div>

                <div class="flex items-center justify-between pt-6">
                    <x-primary-button class="px-6 py-2 bg-gray-800 text-white rounded-lg shadow-md hover:bg-gray-900 transition-all duration-200">
                        Save
                    </x-primary-button>

                    <a href="{{ route('speedruns.index') }}"
                        class="px-4 py-2 bg-gray-800 text-gray-300 rounded-lg hover:bg-gray-900 hover:text-white transition-colors duration-200">
                        Back
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
