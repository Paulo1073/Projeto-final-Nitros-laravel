<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl ml-6 text-primary tracking-wide">
                {{ __('Edit Wishlist') }}
            </h2>
        </div>
    </x-slot>

    <div class="flex min-h-screen bg-[#070707]">

        
        <div class="hidden md:block bg-center bg-cover w-[1000px] h-[600px] border-r border-primary/40 shadow-2xl"
             style="background-image: url('{{ asset('assets/images/gameroption5.png') }}');">
        </div>

       
        <div class="flex flex-col justify-center ml-[60px] mr-[20px] mt-[8px] mb-32">
            <x-application-logo-2 class="w-[100px] h-[100px] ml-[160px] fill-current text-gray-500" />

            <form action="{{ route('wishlists.update', $wishlist->id) }}" 
                  method="POST" 
                  enctype="multipart/form-data"
                  class="space-y-6 text-gray-200">
                @csrf
                @method('PUT')

                <div class="flex gap-10">

                    
                    <div class="flex flex-col space-y-4">

                        
                        <div>
                            <x-input-label for="name" :value="__('Game Name')" class="text-primary mb-1" />
                            <x-text-input id="name" name="name" 
                                :value="old('name', $wishlist->name)" 
                                required
                                class="w-[260px] bg-gray-900 border border-primary text-gray-100 rounded-lg 
                                       focus:ring-2 focus:ring-primary focus:border-primary" />
                        </div>

                        
                        <div>
                            <x-input-label for="date" :value="__('Release Date')" class="text-primary mb-1" />
                            <x-text-input id="date" name="date" type="date" 
                                :value="old('date', $wishlist->date)" 
                                required
                                class="w-[260px] bg-gray-900 border border-primary text-gray-100 rounded-lg 
                                       focus:ring-2 focus:ring-primary focus:border-primary" />
                        </div>

                       
                        <div>
                            <x-input-label for="status" :value="__('Status')" class="text-primary mb-1" />
                            <select id="status" name="status" required
                                class="pl-2 w-[260px] h-9 bg-gray-900 border border-primary text-gray-100 rounded-lg 
                                       focus:ring-2 focus:ring-primary focus:border-primary">
                                <option value="desired" {{ old('status', $wishlist->status) == 'desired' ? 'selected' : '' }}>
                                    Desejado
                                </option>
                                <option value="purchased" {{ old('status', $wishlist->status) == 'purchased' ? 'selected' : '' }}>
                                    Comprado
                                </option>
                            </select>
                        </div>

                        
                        <div>
                            <x-input-label for="image" :value="__('New Game Image')" class="text-primary mb-1" />
                            <input type="file" name="image" id="image"
                                class="w-[260px] text-gray-100 bg-gray-900 border border-primary rounded-lg 
                                       file:mr-3 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm 
                                       file:font-semibold file:bg-primary file:text-white 
                                       hover:file:bg-purple-700 transition-all duration-200" />
                        </div>

                    </div>

                    
                    <div class="flex flex-col space-y-4 items-center justify-center">
                        @if ($wishlist->image)
                            <div class="flex flex-col w-[100px] h-[100px] items-center">
                                <span class="text-gray-400 text-sm mb-1">Current image:</span>
                                <img src="{{ asset('storage/' . $wishlist->image) }}" 
                                     alt="{{ $wishlist->name }}"
                                     class="w-[100px] h-[100px] object-cover rounded-lg border border-primary shadow-lg">
                            </div>
                        @endif
                    </div>

                </div>

                
                <div class="flex items-center justify-between pt-6">
                    <x-primary-button
                        class="px-6 py-2 bg-gradient-to-r from-primary to-purple-900 
                               hover:from-purple-700 hover:to-purple-800 text-white 
                               rounded-lg shadow-md transition-all duration-200">
                        Save
                    </x-primary-button>

                    <a href="{{ route('wishlists.index') }}"
                       class="px-4 py-2 bg-gray-800 text-gray-300 rounded-lg 
                              hover:bg-gray-900 hover:text-white transition-colors duration-200">
                        Back
                    </a>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
