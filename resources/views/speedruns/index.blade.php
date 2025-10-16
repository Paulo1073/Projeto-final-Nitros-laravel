<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="ml-6 font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Speedruns') }}
            </h2>
            <div class="mt-4">
                <a href="{{ route('reminders.create') }}" class="px-4 py-2 bg-gray-900 text-white rounded hover:bg-purple-900">
                    Cadastrar Speedruns
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
