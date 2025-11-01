<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl ml-6 text-purple-400 tracking-wide">
                {{ __('Edit Friends') }}
            </h2>
        </div>
    </x-slot>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="flex min-h-screen bg-gray-950">

        
        <div class="hidden md:block bg-center bg-cover w-[1000px] h-[570px] border-r border-gray-800 shadow-2xl"
             style="background-image: url('{{ asset('assets/images/gameroption3.png') }}');">
        </div>

        
        <div class="flex flex-col justify-center ml-[40px] mt-[20px] mb-64">
            <x-application-logo-2 class="w-[100px] h-[100px] ml-[70px] fill-current text-gray-500" />

            <form action="{{ route('friends.update', $friend->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                
                <div>
                    <x-input-label for="user_select" :value="__('Select User')" class="text-violet-700 mb-1" />
                    <select id="user_select" name="user_id" required
                        class="w-[250px] bg-gray-800 border border-purple-800/40 text-gray-100 rounded-lg 
                               p-2 focus:ring-2 focus:ring-purple-700 focus:border-purple-700">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id', $friend->user_id) == $user->id ? 'selected' : '' }}>
                                {{ $user->nickname }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('user_id')" class="mt-1 text-red-400 text-sm" />
                </div>

                
                <div>
                    <x-input-label for="bio" :value="__('Description')" class="text-violet-700 mb-1" />
                    <textarea id="bio" name="bio" rows="4"
                        class="w-[250px] bg-gray-800 border border-purple-800/40 text-gray-100 rounded-lg 
                               p-2 focus:ring-2 focus:ring-purple-700 focus:border-purple-700 resize-none">{{ old('bio', $friend->bio) }}</textarea>
                    <x-input-error :messages="$errors->get('bio')" class="mt-1 text-red-400 text-sm" />
                </div>

                
                <div class="flex items-center justify-between pt-4">
                    <x-primary-button
                        class="px-6 py-2 bg-gradient-to-r from-violet-700 to-violet-900 
                               hover:from-purple-700 hover:to-purple-800 text-white 
                               rounded-lg shadow-md transition-all duration-200">
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
