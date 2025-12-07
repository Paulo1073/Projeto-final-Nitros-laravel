<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('assets/favicons/favicon-96x96.png') }}" sizes="96x96">
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/favicons/favicon.svg') }}">
    <link rel="shortcut icon" href="{{ asset('assets/favicons/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicons/apple-touch-icon.png') }}">
    <meta name="apple-mobile-web-app-title" content="Nitros">
    <link rel="manifest" href="{{ asset('assets/favicons/site.webmanifest') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Nitros</title>
</head>

<body class="m-0 p-0 box-border bg-gradient-to-br from-gray-900 via-black to-gray-950 text-white min-h-screen">

    <x-app-layout>

        <x-slot name="header">
            <h2 class="font-semibold text-xl ml-10 text-primary tracking-wide">
                {{ __('Home') }}
            </h2>
        </x-slot>

        <x-banner /> 

        <div class="   ">
           
        </div>

    </x-app-layout>

    <script src="{{ asset('assets/js/dashboard.js') }}"></script>

</body>
</html>
