<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Wishlist') }}
            </h2>
            <a href="{{ route('wishlists.create') }}" class="px-4 py-2 bg-gray-900 text-white rounded hover:bg-purple-900">
                Add Game
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="px-4 py-2 text-left">Name</th>
                        <th class="px-4 py-2 text-left">Image</th>
                        <th class="px-4 py-2 text-left">Date</th>
                        <th class="px-4 py-2 text-left">Status</th>
                        <th class="px-4 py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($wishlists as $item)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $item->name }}</td>
                            <td class="px-4 py-2">
                                @if($item->image)
                                    <img src="{{ $item->image }}" alt="{{ $item->name }}" class="w-16 h-16 object-cover rounded">
                                @else
                                    N/A
                                @endif
                            </td>
                            <td class="px-4 py-2">{{ $item->date?->format('d/m/Y') ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ ucfirst($item->status) }}</td>
                            <td class="px-4 py-2 flex gap-3">
                                <a href="{{ route('wishlists.edit', $item->id) }}" class="px-2 py-1 bg-gray-800 text-white rounded hover:bg-gray-950">Edit</a>

                                <form action="{{ route('wishlists.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Remove this item?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-2 py-1 bg-purple-900 text-white rounded hover:bg-purple-950">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-4 text-center text-gray-500">No games in wishlist.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
