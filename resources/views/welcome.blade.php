<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
       

        @endif
    </head>
    <body class="   bg-[#000000] dark:bg-[#000000] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    
        @if (Route::has('login'))
        <header bg-[#000000] class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-96  ml-104 ">
                <nav class="flex items-end  content-start justify-end  gap-4  ">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal mb-96 "
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal mb-96">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>
        
        <div class="min-h-screen bg-cover bg-center"
        style="background-image: url('{{ asset('assets/images/FND.png') }}')">
        </div>


        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif

    
    </body>
</html>
