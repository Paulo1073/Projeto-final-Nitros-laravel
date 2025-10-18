<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adicionar Amigo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('friends.store') }}" method="POST" class="flex flex-col gap-4">
                @csrf
                <x-input-label for="user_select" :value="__('Escolher Usuário')" />
                <select id="user_select" name="user_id" class="w-full p-2 border rounded">
                    <option value="">-- Selecionar --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->nickname }}</option>
                    @endforeach
                </select>

                <x-input-label for="bio" :value="__('Bio')" />
                <textarea id="bio" name="bio" class="w-full p-2 border rounded" rows="4">{{ old('bio') }}</textarea>
                <x-input-error :messages="$errors->get('bio')" class="mt-1" />

                <x-primary-button class="w-[120px] mt-2">Salvar</x-primary-button>
                <a href="{{ route('friends.index') }}" 
                   class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 text-gray-800">
                    Voltar
                </a>
            </form>
        </div>
    </div>
</x-app-layout>

