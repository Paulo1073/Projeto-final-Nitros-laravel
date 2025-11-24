<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl ml-6 text-primary tracking-wide">
                {{ __('Edit Reminder') }}
            </h2>
        </div>
    </x-slot>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="flex min-h-screen bg-gray-950">

        <!-- Imagem lateral -->
        <div class="hidden md:block bg-center bg-cover w-[800px] h-[600px] 
                    border-r border-primary shadow-2xl"
            style="background-image: url('{{ asset('assets/images/gameroption1.png') }}');">
        </div>

        <!-- Formulário -->
        <div class="flex flex-col justify-center ml-12 mt-[8px] mb-32">

            <x-application-logo-2 
                class="w-[100px] h-[100px] ml-[230px] fill-current text-primary" />

            <form action="{{ route('reminders.update', $reminder->id) }}"
                  method="POST"
                  class="space-y-6">
                @csrf
                @method('PUT')

                <div class="flex gap-10">

                   
                    <div class="flex flex-col space-y-4">

                       
                        <div>
                            <x-input-label for="titulo" :value="__('Reminder Title')" 
                                           class="text-primary mb-1" />
                            <x-text-input id="titulo" name="titulo"
                                :value="old('titulo', $reminder->titulo)" required
                                class="w-[260px] bg-gray-800 border border-primary 
                                       text-gray-100 rounded-lg
                                       focus:ring-2 focus:ring-primary focus:border-primary" />
                        </div>

                        
                        <div>
                            <x-input-label for="game_id" :value="__('Game')" 
                                           class="text-primary mb-1" />
                            <select id="game_id" name="game_id" required
                                class="pl-2 w-[260px] h-9 bg-gray-800 border border-primary 
                                       text-gray-100 rounded-lg
                                       focus:ring-2 focus:ring-primary focus:border-primary">

                                @foreach ($games as $game)
                                    <option value="{{ $game->id }}"
                                        {{ old('game_id', $reminder->game_id) == $game->id ? 'selected' : '' }}>
                                        {{ $game->titulo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        
                        <div>
                            <x-input-label for="concluido" :value="__('Completed')" 
                                           class="text-primary mb-1" />
                            <select id="concluido" name="concluido" required
                                class="pl-2 w-[260px] h-9 bg-gray-800 border border-primary 
                                       text-gray-100 rounded-lg
                                       focus:ring-2 focus:ring-primary focus:border-primary">
                                <option value="0" {{ old('concluido', $reminder->concluido) == 0 ? 'selected' : '' }}>No</option>
                                <option value="1" {{ old('concluido', $reminder->concluido) == 1 ? 'selected' : '' }}>Yes</option>
                            </select>
                        </div>

                    </div>

                    
                    <div class="flex flex-col space-y-4">
                        <div>
                            <x-input-label for="descricao" :value="__('Description')" 
                                           class="text-primary mb-1" />
                            <textarea id="descricao" name="descricao" rows="5"
                                class="w-[280px] h-[130px] bg-gray-800 border border-primary 
                                       text-gray-100 rounded-lg p-2
                                       focus:ring-2 focus:ring-primary focus:border-primary
                                       resize-none">{{ old('descricao', $reminder->descricao) }}</textarea>
                        </div>
                    </div>

                </div>

                
                <div class="flex flex-col md:flex-row items-center justify-between pt-6 gap-4 md:gap-0">

                    <x-primary-button
                        class="px-6 py-2 bg-gray-800 text-white rounded-lg shadow-md 
                               hover:bg-gray-900 transition-all duration-200">
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
