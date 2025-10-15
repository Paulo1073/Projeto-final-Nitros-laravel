<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" type="image/png" href="{{ asset('assets/favicons/favicon-96x96.png') }}" sizes="96x96" />
        <link rel="icon" type="image/svg+xml" href="{{ asset('assets/favicons/favicon.svg') }}" />
        <link rel="shortcut icon" href="{{ asset('assets/favicons/favicon.ico') }}" />
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicons/apple-touch-icon.png') }}" />
        <meta name="apple-mobile-web-app-title" content="Nitros" />
        <link rel="manifest" href="{{ asset('assets/favicons/site.webmanifest') }}" />
        <title>Nitros</title>
    </head>
    <body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl ml-10 text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>
         @vite(['resources/css/app.css', 'resources/js/app.js'])
        <x-banner/>
        <div class="h-160" >

        </div>
    </x-app-layout>
    
</body>
</html>