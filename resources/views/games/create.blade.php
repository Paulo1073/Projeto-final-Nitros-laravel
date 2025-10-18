<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between " >
            <h2 class="font-semibold text-xl  text-gray-800 leading-tight">
                {{ __('Cadastro de Jogos') }}
            </h2>
            
        </div>
    </x-slot>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
    <div class="py-12">
        <form class="flex ml-4 flex-col" action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-input-label  for="titulo" :value="__('Título')" />
            <x-text-input  class="w-64" id="titulo" name="titulo" :value="old('titulo')" required />

            <x-input-label class="mt-4" for="genero" :value="__('Gênero')" />
            <x-text-input class="w-64" id="genero" name="genero" :value="old('genero')" required />

            <x-input-label class="mt-4" for="descricao" :value="__('Descrição')" />
            <textarea  class="w-64 p-2" id="descricao" name="descricao" rows="4">{{ old('descricao') }}</textarea>

            <x-input-label class="mt-4" for="plataforma" :value="__('Plataforma')" />
            <x-text-input class="w-64" id="plataforma" name="plataforma" :value="old('plataforma')" required />

            <x-input-label class="mt-4" for="imagem" :value="__('Imagem do Jogo')" />
            <input class="" type="file" name="imagem" required />

            <x-primary-button class=" text-center hover:bg-purple-900 mt-4  w-[115px]" >Cadastrar</x-primary-button>
            <a href="{{ route('games.index') }}" 
                   class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 text-gray-800">
                    Voltar
                </a>
        </form>
    </div>


</x-app-layout>
