<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Editar Jogo') }}
            </h2>
        </div>
    </x-slot>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <div class="py-12">
        <form class="flex ml-4 flex-col" action="{{ route('games.update', $game->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Spoofing do método PUT -->

            <x-input-label for="titulo" :value="__('Título')" />
            <x-text-input class="w-64" id="titulo" name="titulo" :value="old('titulo', $game->titulo)" required />

            <x-input-label class="mt-4" for="genero" :value="__('Gênero')" />
            <x-text-input class="w-64" id="genero" name="genero" :value="old('genero', $game->genero)" required />

            <x-input-label class="mt-4" for="descricao" :value="__('Descrição')" />
            <textarea class="w-64 p-2" id="descricao" name="descricao" rows="4">{{ old('descricao', $game->descricao) }}</textarea>

            <x-input-label class="mt-4" for="plataforma" :value="__('Plataforma')" />
            <x-text-input class="w-64" id="plataforma" name="plataforma" :value="old('plataforma', $game->plataforma)" required />

            <x-input-label class="mt-4" for="imagem" :value="__('Imagem do Jogo')" />
            <input class="" type="file" name="imagem" />
            
            @if($game->imagem)
                <div class="mt-2">
                    <span class="text-gray-600 text-sm">Imagem atual:</span><br>
                    <img src="{{ asset('storage/' . $game->imagem) }}" alt="{{ $game->titulo }}" class="w-32 h-32 object-cover rounded mt-1">
                </div>
            @endif

            <x-primary-button class="text-center hover:bg-purple-900 mt-4 w-[110px]">
                Atualizar
            </x-primary-button>
        </form>
    </div>
</x-app-layout>
