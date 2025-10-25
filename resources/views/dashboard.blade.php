<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('assets/favicons/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/favicons/favicon.svg') }}" />
    <link rel="shortcut icon" href="{{ asset('assets/favicons/favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicons/apple-touch-icon.png') }}" />
    <meta name="apple-mobile-web-app-title" content="Nitros" />
    <link rel="stylesheet" href="{{asset('assets/css/dashboard.css')}}" />"
    <link rel="manifest" href="{{ asset('assets/favicons/site.webmanifest') }}" />
    <title>Nitros</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="m-0 p-0 box-border bg-gradient-to-br from-gray-900 via-black to-gray-950 text-white min-h-screen">
    <x-app-layout>

        <x-slot name="header">
            <h2 class="font-semibold text-xl ml-10 text-purple-400 tracking-wide">
                 {{ __('Dashboard') }}
            </h2>
        </x-slot>

      
        <x-banner/>

   
        <div class="">
            
          
            <section class="bg-gray-900">

                <div class="flex items-center justify-between bg-gray-950 w-full h-32 px-8">
                    <h1 class="text-[30px] font-bold text-white text-center flex-1">Meus Jogos</h1>

                    <a href="{{ route('games.create') }}"
                    class="bg-purple-700 hover:bg-purple-800 text-white px-4 py-2 rounded-lg text-sm font-medium transition">
                    + Adicionar Novo
                    </a>
                </div>
                <div class="relative px-10">

                    <button id="prev" 
                    class="absolute left-0 top-1/2 -translate-y-1/2 bg-gray-800 text-white px-3 py-2 rounded-r-lg hover:bg-gray-700 z-10">
                    ←
                    </button>


                    <div id="gameCarousel" 
                    class="flex overflow-x-auto scroll-smooth space-x-4 pb-4 no-scrollbar">
                    @forelse($games as $game)
                        <div class="flex-none w-60 bg-gray-900 border-2 border-purple-800 rounded-lg overflow-hidden hover:scale-105 transform transition duration-300 shadow-lg hover:shadow-[0_0_15px_#9333ea]">

                            <img src="{{ asset('storage/' . $game->imagem) }}" 
                                alt="{{ $game->titulo }}" 
                                class="w-full h-40 object-cover">

                            <div class="p-3">
                                <h4 class="font-semibold truncate text-white">{{ $game->titulo }}</h4>
                                <p class="text-sm text-gray-400">{{ $game->plataforma }}</p>
                                <span class="text-xs bg-purple-700 px-2 py-1 rounded mt-2 inline-block">
                                {{ ucfirst($game->status ?? 'Jogando') }}
                                </span>
                            </div>

                        </div>
                    @empty
                        <p class="text-gray-400 text-center w-full">Nenhum jogo adicionado ainda</p>
                    @endforelse
                    </div>


                    <button id="next" 
                    class="absolute right-0 top-1/2 -translate-y-1/2 bg-gray-800 text-white px-3 py-2 rounded-l-lg hover:bg-gray-700 z-10">
                    →
                    </button>
                </div>
                </section>

                <section>
                    
                </section>

 
                

                


            
                
        </div>
    </x-app-layout>

    <script src="{{ asset('assets/js/dashboard.js') }}"></script>

</body>
</html>
