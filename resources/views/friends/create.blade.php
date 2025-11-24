<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl ml-6 text-primary tracking-wide">
                {{ __('Friends Registration') }}
            </h2>
        </div>
    </x-slot>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="flex min-h-screen bg-gray-950">

        <div class="hidden md:block bg-center bg-cover w-[1000px] h-[570px] border-r border-primary shadow-2xl"
             style="background-image: url('{{ asset('assets/images/gameroption3.png') }}');">
        </div>

        <div class="flex flex-col justify-center ml-[40px] mt-[20px] mb-64">

            <form action="{{ route('friends.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <x-input-label for="user_select" :value="__('Select User')" class="text-primary mb-1" />
                    <select id="user_select" name="user_id" required
                        class="w-[250px] bg-gray-800 border border-primary text-gray-100 rounded-lg 
                               p-2 focus:ring-2 focus:ring-primary focus:border-primary">
                        <option value="">Select</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->nickname }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <x-input-label for="bio" :value="__('Description')" class="text-primary mb-1" />
                    <textarea id="bio" name="bio" rows="4"
                        class="w-[250px] bg-gray-800 border border-primary text-gray-100 rounded-lg 
                               p-2 focus:ring-2 focus:ring-primary focus:border-primary resize-none">{{ old('bio') }}</textarea>
                </div>

                <div class="flex items-center justify-between pt-4">
                    <x-primary-button
                        class="px-6 py-2 bg-gray-800 text-white rounded-lg shadow-md hover:bg-gray-900 transition-all duration-200">
                        Save
                    </x-primary-button>

                    <a href="{{ route('friends.index') }}"
                       class="px-4 py-2 bg-gray-800 text-gray-300 rounded-lg 
                              hover:bg-gray-900 hover:text-white transition-colors duration-200">
                        Back
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
