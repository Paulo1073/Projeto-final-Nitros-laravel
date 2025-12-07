<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl ml-6 text-primary tracking-wide">
                {{ __('Edit Game') }}
            </h2>
        </div>
    </x-slot>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="flex min-h-screen bg-gray-950">
       
        <div class="hidden md:block bg-center bg-cover w-[800px] h-[600px] border-r border-primary shadow-2xl"
            style="background-image: url('{{ asset('assets/images/gameoption2.png') }}');">
        </div>

        <div class="flex flex-col justify-center ml-12 mt-[8px] mb-32">
            
            
            <form action="{{ route('games.update', $game->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                @method('PUT')

                <div class="flex gap-10">
                    <div class="flex flex-col space-y-4">

                        <div>
                            <x-input-label for="titulo" :value="__('Game Name')" class="text-primary mb-1" />
                            <x-text-input id="titulo" name="titulo" :value="old('titulo', $game->titulo)"
                                class="w-[260px] bg-gray-800 border border-primary text-gray-100 rounded-lg 
                                       focus:ring-2 focus:ring-primary focus:border-primary" />
                            @error('titulo')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <x-input-label for="genero" :value="__('Gender')" class="text-primary mb-1" />
                            <x-text-input id="genero" name="genero" :value="old('genero', $game->genero)"
                                class="w-[260px] bg-gray-800 border border-primary text-gray-100 rounded-lg 
                                       focus:ring-2 focus:ring-primary focus:border-primary" />
                            @error('genero')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <x-input-label for="plataforma" :value="__('Plataform')" class="text-primary mb-1" />
                            <select id="plataforma" name="plataforma"
                                class="pl-2 w-[260px] h-9 bg-gray-800 border border-primary text-gray-100 rounded-lg 
                                       focus:ring-2 focus:ring-primary focus:border-primary">
                                <option value="PS2" {{ old('plataforma', $game->plataforma) == 'PS2' ? 'selected' : '' }}>PS2</option>
                                <option value="PS3" {{ old('plataforma', $game->plataforma) == 'PS3' ? 'selected' : '' }}>PS3</option>
                                <option value="PS4" {{ old('plataforma', $game->plataforma) == 'PS4' ? 'selected' : '' }}>PS4</option>
                                <option value="PS5" {{ old('plataforma', $game->plataforma) == 'PS5' ? 'selected' : '' }}>PS5</option>
                                <option value="XBOX ONE" {{ old('plataforma', $game->plataforma) == 'XBOX ONE' ? 'selected' : '' }}>XBOX ONE</option>
                                <option value="XBOX 360" {{ old('plataforma', $game->plataforma) == 'XBOX 360' ? 'selected' : '' }}>XBOX 360</option>
                                <option value="XBOX SERIES X|S" {{ old('plataforma', $game->plataforma) == 'XBOX SERIES X|S' ? 'selected' : '' }}>XBOX SERIES X|S</option>
                                <option value="NITENDO" {{ old('plataforma', $game->plataforma) == 'NITENDO' ? 'selected' : '' }}>NITENDO</option>
                                <option value="PC" {{ old('plataforma', $game->plataforma) == 'PC' ? 'selected' : '' }}>PC</option>
                                <option value="OTHERS" {{ old('plataforma', $game->plataforma) == 'OTHERS' ? 'selected' : '' }}>OTHERS</option>
                            </select>
                            @error('plataforma')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <x-input-label for="imagem" :value="__('Game Image')" class="text-primary mb-1" />
                            <input type="file" name="imagem" id="imagem"
                                class="w-full text-gray-100 bg-gray-900 border border-primary rounded-lg 
                                        file:mr-3 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm 
                                        file:font-semibold file:bg-gray-800 file:text-white 
                                        hover:file:bg-gray-700 transition-all duration-200 file:hover:cursor-pointer " />
                            @error('imagem')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-col space-y-4 items-center">

                        <div>
                            <x-input-label for="descricao" :value="__('Description')" class="text-primary mb-1" />
                            <textarea id="descricao" name="descricao" rows="5"
                                class="w-[280px] h-[130px] bg-gray-800 border border-primary text-gray-100 rounded-lg p-2 
                                       focus:ring-2 focus:ring-primary focus:border-primary resize-none">{{ old('descricao', $game->descricao) }}</textarea>
                            @error('descricao')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        @if ($game->imagem)
                            <div class="flex flex-col items-center">
                                <span class="text-gray-400 text-sm mb-1">Current Image:</span>
                                <img src="{{ asset('storage/' . $game->imagem) }}" alt="{{ $game->titulo }}"
                                    class="w-[100px] h-[100px] object-cover rounded-lg border border-primary shadow-lg">
                            </div>
                        @endif
                    </div>
                </div>

                <div class="flex flex-col md:flex-row items-center justify-between pt-6 gap-4 md:gap-0">
                    <x-primary-button
                        class="px-6 py-2 bg-gray-800 text-white rounded-lg shadow-md hover:bg-gray-900 transition-all duration-200">
                        Save
                    </x-primary-button>

                    <a href="{{ route('games.index') }}"
                        class="px-4 py-2 bg-gray-800 text-gray-300 rounded-lg 
                              hover:bg-gray-900 hover:text-white transition-colors duration-200">
                        Back
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
