<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add to Wishlist') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <form action="{{ route('wishlists.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4 ml-4">
            @csrf

            <x-input-label for="name" :value="__('Game Name')" />
            <x-text-input id="name" name="name" class="w-64" value="{{ old('name') }}" />

            <x-input-label class="mt-4" for="image" :value="__('Game Image')" />
            <input type="file" name="image" required />

            <x-input-label for="date" :value="__('Release Date')" />
            <x-text-input id="date" name="date" type="date" class="w-64" value="{{ old('date') }}" />

            <x-input-label for="status" :value="__('Status')" />
            <select id="status" name="status" class="w-64">
                <option value="desired" {{ old('status') == 'desired' ? 'selected' : '' }}>Desired</option>
                <option value="purchased" {{ old('status') == 'purchased' ? 'selected' : '' }}>Purchased</option>
            </select>

            <x-primary-button class="w-[160px] mt-4 hover:bg-purple-800">Save</x-primary-button>
        </form>
    </div>
</x-app-layout>
