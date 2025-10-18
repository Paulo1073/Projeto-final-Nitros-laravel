<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Wishlist Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <form action="{{ route('wishlists.update', $wishlist->id) }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4 ml-4">
            @csrf
            @method('PUT')

            <x-input-label for="name" :value="__('Game Name')" />
            <x-text-input id="name" name="name" class="w-64" value="{{ old('name', $wishlist->name) }}" />

            <x-input-label for="image" :value="__('Game Image')" />
            <input type="file" id="image" name="image" />
            @if($wishlist->image)
                <img src="{{ asset('storage/' . $wishlist->image) }}" alt="{{ $wishlist->name }}" class="w-32 h-32 mt-2 object-cover rounded">
            @endif

            <x-input-label for="date" :value="__('Release Date')" />
            <x-text-input id="date" name="date" type="date" class="w-64" value="{{ old('date', $wishlist->date) }}" />

            <x-input-label for="status" :value="__('Status')" />
            <select id="status" name="status" class="w-64">
                <option value="desired" {{ old('status', $wishlist->status) == 'desired' ? 'selected' : '' }}>Desired</option>
                <option value="purchased" {{ old('status', $wishlist->status) == 'purchased' ? 'selected' : '' }}>Purchased</option>
            </select>

            <div class="flex gap-4 mt-4">
                <x-primary-button class="w-[160px] hover:bg-purple-800">Update</x-primary-button>
                <a href="{{ route('wishlists.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 text-gray-800">Back</a>
            </div>
        </form>
    </div>
</x-app-layout>
