<x-profile-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl ml-[200px] text-purple-400 tracking-wide">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="ml-[250px] py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-[#070707] shadow border-2 border-purple-700 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-[#070707] border-2 border-purple-700 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-[#070707] border-2 border-purple-700 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-profile-layout>
