<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl ml-6 text-primary tracking-wide">
                {{ __('My Friends') }}
            </h2>

            <a href="{{ route('friends.create') }}"
                class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-900 transition-colors">
                Add Friends
            </a>
        </div>
    </x-slot>

    <div class="min-h-screen bg-[#070707] flex flex-col">
        <div class="flex-1 pt-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="rounded-2xl shadow-2xl border border-primary bg-gradient-to-b from-gray-950 to-gray-900">

                    <div class="max-h-[500px] overflow-y-auto scrollbar-thin scrollbar-thumb-gray-700 scrollbar-track-gray-900">
                        <table class="min-w-full text-sm text-gray-200">

                            <thead class="bg-[#070707] border-b-2 border-primary sticky top-0 z-10 backdrop-blur-md">
                                <tr>
                                    <th class="px-6 py-3 text-left font-semibold tracking-wider text-primary">Nickname</th>
                                    <th class="px-[170px] py-3 text-left font-semibold tracking-wider text-primary">Description</th>
                                    
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($friends as $friend)
                                    <tr class="border-b border-primary hover:bg-primary/20 transition-colors duration-300">

                                        <td class="px-6 py-3 font-semibold text-white">
                                            {{ $friend->nickname }}
                                        </td>

                                        <td class="px-6 py-3 text-gray-300 whitespace-pre-wrap">
                                            {{ $friend->bio }}
                                        </td>

                                        <td class="px-6 py-3 flex items-center mt-4 gap-3">

                                            <a href="{{ route('friends.edit', $friend) }}"
                                                class="px-3 py-1.5 bg-gradient-to-r from-blue-700 to-blue-800
                                                       hover:from-blue-600 hover:to-blue-700 text-white
                                                       rounded-lg shadow-md transition-all duration-200 flex items-center gap-1">
                                                ✏️ Edit
                                            </a>

                                            <form action="{{ route('friends.destroy', $friend) }}" method="POST"
                                                onsubmit="return confirm('Tem certeza que deseja remover este amigo?');">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="px-3 py-1.5 bg-red-800 hover:bg-red-700
                                                           text-white rounded-lg shadow-md transition-all duration-200 flex items-center gap-1">
                                                    🗑️ Delete
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-6 text-center text-gray-500 italic">
                                            Friends not found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
