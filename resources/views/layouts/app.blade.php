<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('assets/favicons/favicon.ico') }}">
    <title>Nitros</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/games.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 overflow-hidden text-white min-h-screen">

    <!-- Barra lateral -->
    @include('layouts.navigation')

    <!-- Conteúdo principal -->
    <div class="ml-64 min-h-screen bg-[#0B0B0B]">
        @isset($header)
            <header class="bg-[#090909] border-b-2 border-purple-800">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <main class="p-6">
            {{ $slot }}
        </main>
    </div>

</body>
</html>
