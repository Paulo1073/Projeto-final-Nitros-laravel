<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl ml-6 text-purple-400 tracking-wide">
                {{ __('Reminders Registration') }}
            </h2>
        </div>
    </x-slot>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="flex min-h-screen bg-gray-950">
        
        <div class="hidden md:block bg-center bg-cover w-[1000px] h-[570px] border-r border-gray-800 shadow-2xl"
             style="background-image: url('{{ asset('assets/images/gameroption1.png') }}');">
        </div>

        
        <div class="flex flex-col justify-center ml-[40px] mt-[20px] mb-64">

            <x-application-logo-2 class="w-[100px] h-[100px] ml-[160px] fill-current text-gray-500" />

            <form action="{{ route('reminders.store') }}" method="POST" class="space-y-5">
                @csrf


                <div class="flex gap-6">
                    <div class="flex-col ">

                        <div>
                            <x-input-label for="titulo" :value="__('Reminders Title')" class="text-violet-700 mb-1" />
                            <x-text-input id="titulo" name="titulo" :value="old('titulo')" required
                                class="w-46 bg-gray-800 border border-purple-800/40 text-gray-100 rounded-lg 
                                       focus:ring-2 focus:ring-purple-700 focus:border-purple-700" />
                        </div>

                        
                        <div class="mt-[10px]">
                            <x-input-label for="game_id" :value="__('Game')" class="text-violet-700 mb-1" />
                            <select id="game_id" name="game_id" required
                                class="pl-2 w-46 h-8 bg-gray-800 border border-purple-800/40 text-gray-100 rounded-lg 
                                       focus:ring-2 focus:ring-purple-700 focus:border-purple-700">
                                @foreach($games as $game)
                                    <option value="{{ $game->id }}">{{ $game->titulo }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                   
                    <div>
                        <x-input-label for="descricao" :value="__('Description')" class="text-violet-700 mb-1" />
                        <textarea id="descricao" name="descricao" rows="4"
                            class="w-[200px] h-[100px] bg-gray-800 border border-purple-800/40 text-gray-100 rounded-lg 
                                   p-2 focus:ring-2 focus:ring-purple-700 focus:border-purple-700 resize-none">{{ old('descricao') }}
                        </textarea>
                    </div>
                </div>

                
                <div class="flex items-center justify-between pt-6">
                    <x-primary-button
                        class="px-6 py-2 bg-gradient-to-r from-violet-700 to-violet-900 
                               hover:from-purple-700 hover:to-purple-800 text-white 
                               rounded-lg shadow-md transition-all duration-200">
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
