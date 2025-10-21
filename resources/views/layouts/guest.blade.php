<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="icon" type="image/png" href="{{ asset('assets/favicons/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/favicons/favicon.svg') }}" />
    <link rel="shortcut icon" href="{{ asset('assets/favicons/favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicons/apple-touch-icon.png') }}" />
    <meta name="apple-mobile-web-app-title" content="Nitros" />
    <link rel="manifest" href="{{ asset('assets/favicons/site.webmanifest') }}" />

    <title>Nitros</title>


    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans relative text-gray-900 antialiased">

>
    <div 
        class="fixed inset-0 bg-center bg-cover  opacity-50 -z-10"
        style="background-image: url('{{ asset('assets/images/FND-login.png') }}');">
    </div>


    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-transparent">
        <div>
            <a href="/">
                <x-application-logo class="w-36 h-36 fill-current text-gray-500" />
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-2 px-6 py-4 bg-white/80 backdrop-blur-md shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>

</body>
</html>
