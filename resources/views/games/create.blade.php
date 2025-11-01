<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl ml-6 text-purple-400 tracking-wide">
                {{ __('Cadastro de Jogos') }}
            </h2>
        </div>
    </x-slot>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="flex min-h-screen bg-gray-950">
        
        <div class="hidden md:block bg-center bg-cover w-[900px] h-[567px] border-r border-gray-800 shadow-2xl  "
             style="background-image: url('{{ asset('assets/images/gameoption2.png') }}');">
        </div>

        
        <div class="flex flex-col justify-center ml-12  mt-[20px] mb-64 ">
                <x-application-logo-2 class="w-[100px] h-[100px] ml-[160px] fill-current text-gray-500" />
                
                <form  action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                    @csrf
                    <div  class="flex gap-6">
                        <div class="flex-col">
                            <div>
                                <x-input-label for="titulo" :value="__('Nome do jogo')" class="text-violet-700 mb-1" />
                                <x-text-input id="titulo" name="titulo" :value="old('titulo')" required
                                    class="w-46 bg-gray-800 border border-purple-800/40 text-gray-100 rounded-lg 
                                           focus:ring-2 focus:ring-purple-700 focus:border-purple-700" />
                            </div>
        
                            
                            <div class="mt-[10px]">
                                <x-input-label for="genero" :value="__('Gênero')" class="text-violet-700 mb-1" />
                                <x-text-input id="genero" name="genero" :value="old('genero')" required
                                    class="w-46 bg-gray-800 border border-purple-800/40 text-gray-100 rounded-lg 
                                           focus:ring-2 focus:ring-purple-700 focus:border-purple-700" />
                            </div>
                        </div>


                        <div>
                            <x-input-label for="descricao" :value="__('Descrição')" class="text-violet-700 mb-1" />
                            <textarea id="descricao" name="descricao" rows="4" class="w-[200px] h-[100px] bg-gray-800 border border-purple-800/40 text-gray-100 rounded-lg p-2 focus:ring-2 focus:ring-purple-700 focus:border-purple-700 resize-none">{{ old('descricao') }}
                            </textarea>
                        </div>

                    </div>


                   
                    <div>
                        <x-input-label for="plataforma" :value="__('Plataforma')" class="text-violet-700 mb-1" />
                         <select id="plataforma" name="plataforma" :value="old('plataforma')" required
                           class=" pl-2 w-46 h-8 bg-gray-800 border border-purple-800/40 text-gray-100 rounded-lg 
                         focus:ring-2 focus:ring-purple-700 focus:border-purple-700" /> 
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
                    
                    </div>

                    
                    <div>
                        <x-input-label for="imagem" :value="__('Imagem do Jogo')" class="text-violet-700 mb-1" />
                        <input type="file" name="imagem" id="imagem" required
                            class="w-full text-gray-100 bg-gray-800 border border-purple-800/40 rounded-lg 
                                   file:mr-3 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm 
                                   file:font-semibold file:bg-violet-700 file:text-white 
                                   hover:file:bg-purple-700 transition-all duration-200" />
                    </div>

                    
                    <div class="flex items-center justify-between pt-6">
                        <x-primary-button
                            class="px-6 py-2 bg-gradient-to-r from-violet-700 to-violet-900 
                                   hover:from-purple-700 hover:to-purple-800 text-white 
                                   rounded-lg shadow-md transition-all duration-200">
                            Cadastrar
                        </x-primary-button>

                        <a href="{{ route('games.index') }}" 
                           class="px-4 py-2 bg-gray-800 text-gray-300 rounded-lg 
                                  hover:bg-gray-900 hover:text-white transition-colors duration-200">
                            Voltar
                        </a>
                    </div>
                </form>
            
        </div>
    </div>
</x-app-layout>
