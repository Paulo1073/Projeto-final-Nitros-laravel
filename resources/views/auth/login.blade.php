<x-guest-layout>


    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf


        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class=" hover:cursor-pointer   hover:border-gray-900 block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="   hover:border-gray-900 hover:cursor-pointer block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

     
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class=" hover:cursor-pointer  rounded hover:border-gray-900 border-gray-300 text-indigo-800 shadow-sm focus:ring-indigo-800" name="remember">
                <span class="ms-1 text-sm hover:text-purple-900 hover:cursor-pointer text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-purple-900 rounded-md " href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class=" hover:bg-purple-900 bg-gray-950 ms-3">
                {{ __('Login') }}
            </x-primary-button>
        </div>
    </form>

    
</x-guest-layout>
