<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl ml-6 text-primary tracking-wide">
                {{ __('Game Registration') }}
            </h2>
        </div>
    </x-slot>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="flex min-h-screen bg-gray-950">

        <div class="hidden md:block bg-center bg-cover w-[900px] h-[567px] border-r border-gray-900 shadow-2xl"
            style="background-image: url('{{ asset('assets/images/gameoption2.png') }}');">
        </div>

        <div class="flex flex-col justify-center ml-0 md:ml-12 mt-5 mb-64 w-full md:w-auto">

            <form action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5 mt-6">
                @csrf

                <div class="flex flex-col md:flex-row gap-6">
                    <div class="flex flex-col gap-4">

                        <div>
                            <x-input-label for="titulo" :value="__('Game Name')" class="text-primary mb-1" />
                            <x-text-input id="titulo" name="titulo" :value="old('titulo')"
                                class="w-[180px] bg-gray-800 border border-primary text-gray-100 rounded-lg 
                                       focus:ring-2 focus:ring-primary focus:border-primary" />
                            <x-input-error :messages="$errors->get('titulo')" class="mt-1 text-red-500" />
                        </div>

                        <div>
                            <x-input-label for="genero" :value="__('Gender')" class="text-primary mb-1" />
                            <x-text-input id="genero" name="genero" :value="old('genero')"
                                class="w-[180px] bg-gray-800 border border-primary text-gray-100 rounded-lg 
                                       focus:ring-2 focus:ring-primary focus:border-primary" />
                            <x-input-error :messages="$errors->get('genero')" class="mt-1 text-red-500" />
                        </div>
                    </div>

                    <div>
                        <x-input-label for="descricao" :value="__('Description')" class="text-primary mb-1" />
                        <textarea id="descricao" name="descricao" rows="4"
                            class="w-[300px] h-[100px] bg-gray-800 border border-primary text-gray-100 rounded-lg p-2 
                                   focus:ring-2 focus:ring-primary focus:border-primary resize-none">{{ old('descricao') }}</textarea>
                        <x-input-error :messages="$errors->get('descricao')" class="mt-1 text-red-500" />
                    </div>
                </div>

                <div>
                    <x-input-label for="plataforma" :value="__('Plataform')" class="text-primary mb-1" />
                    <select id="plataforma" name="plataforma"
                        class="pl-2 w-[180px] h-8 bg-gray-800 border border-primary text-gray-100 rounded-lg 
                               focus:ring-2 focus:ring-primary focus:border-primary">
                        <option value="">Selecione...</option>
                        <option value="PS2">PS2</option>
                        <option value="PS3">PS3</option>
                        <option value="PS4">PS4</option>
                        <option value="PS5">PS5</option>
                        <option value="XBOX ONE">XBOX ONE</option>
                        <option value="XBOX 360">XBOX 360</option>
                        <option value="XBOX SERIES X|S">XBOX SERIES X|S</option>
                        <option value="NITENDO">NITENDO</option>
                        <option value="PC">PC</option>
                        <option value="OTHERS">OTHERS</option>
                    </select>
                    <x-input-error :messages="$errors->get('plataforma')" class="mt-1 text-red-500" />
                </div>

                <div>
                    <x-input-label for="imagem" :value="__('Game Image')" class="text-primary mb-1" />
                    <input type="file" name="imagem" id="imagem"
                        class="w-full text-gray-100 bg-gray-900 border border-primary rounded-lg 
                              file:mr-3 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm 
                              file:font-semibold file:bg-gray-800 file:text-white 
                              hover:file:bg-gray-700 transition-all duration-200 file:hover:cursor-pointer " />
                    <x-input-error :messages="$errors->get('imagem')" class="mt-1 text-red-500" />
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
