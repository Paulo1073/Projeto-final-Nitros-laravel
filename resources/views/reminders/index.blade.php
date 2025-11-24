<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl ml-6 text-primary tracking-wide">
                {{ __('Reminders') }}
            </h2>
            <a href="{{ route('reminders.create') }}"
                class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-900 transition-colors">
                Add Reminder
            </a>
        </div>
    </x-slot>

    <div class="min-h-screen bg-[#070707] flex flex-col">
        <div class="flex-1 pt-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="rounded-2xl shadow-2xl border border-primary bg-gradient-to-b from-gray-950 to-gray-900">
                    <div
                        class="max-h-[500px] overflow-y-auto scrollbar-thin scrollbar-thumb-gray-700 scrollbar-track-gray-900">

                        <table class="min-w-full text-sm text-gray-200">
                            <thead class="bg-[#070707] border-b-2 border-primary sticky top-0 z-10 backdrop-blur-md">
                                <tr>
                                    <th class="px-6 py-3 text-left font-semibold tracking-wider text-primary">Game</th>
                                    <th class="px-6 py-3 text-left font-semibold tracking-wider text-primary">Title</th>
                                    <th class="px-[200px] py-3 text-left font-semibold tracking-wider text-primary">Description</th>
                                    <th class="px-2 py-3 text-left font-semibold tracking-wider text-primary">Completed</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($reminders as $reminder)
                                    <tr
                                        class="border-b border-primary hover:bg-primary/20 transition-colors duration-300">
                                        <td class="px-6 py-3 font-semibold text-white">
                                            {{ $reminder->game->titulo ?? 'Game not found' }}
                                        </td>

                                        <td class="px-6 py-3 text-gray-300">
                                            {{ $reminder->titulo }}
                                        </td>

                                        <td class="px-6 py-3 text-gray-400 whitespace-pre-wrap">
                                            {{ $reminder->descricao }}
                                        </td>

                                        <td class="px-6 py-3">
                                            @if ($reminder->concluido)
                                                <span class="text-green-500 font-semibold">✔️ Yes</span>
                                            @else
                                                <span class="text-red-500 font-semibold">❌ No</span>
                                            @endif
                                        </td>

                                        <td class="px-6 py-3 flex items-center mt-4 gap-3">
                                            <a href="{{ route('reminders.edit', $reminder->id) }}"
                                                class="px-3 py-1.5 bg-gradient-to-r from-blue-700 to-blue-800 hover:from-blue-600 hover:to-blue-700 text-white rounded-lg shadow-md transition-all duration-200 flex items-center gap-1">
                                                ✏️ Edit
                                            </a>

                                            <form action="{{ route('reminders.destroy', $reminder->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Deseja realmente excluir este lembrete?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-3 py-1.5 bg-red-800 hover:bg-red-700 text-white rounded-lg shadow-md transition-all duration-200 flex items-center gap-1">
                                                    🗑️ Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-6 text-center text-gray-500 italic">
                                            No reminders found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
        </div>

        <script src="{{ asset('assets/js/color.js') }}"></script>
    </div>
</x-app-layout>
