<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Amigo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('friends.update', $friend) }}" method="POST" class="flex flex-col gap-4">
                @csrf
                @method('PUT')

                <x-input-label for="user_select" :value="__('Escolher Usuário')" />
                <select id="user_select" name="user_id" class="w-full p-2 border rounded">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $friend->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->nickname }}
                        </option>
                    @endforeach
                </select>

                <x-input-label for="bio" :value="__('Bio')" />
                <textarea id="bio" name="bio" class="w-full p-2 border rounded" rows="4">{{ old('bio', $friend->bio) }}</textarea>

                <x-primary-button class="w-[110px] mt-2">Atualizar</x-primary-button>
            </form>

        
        </div>
    </div>
</x-app-layout>
