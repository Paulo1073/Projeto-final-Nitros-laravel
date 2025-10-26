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
    <link rel="stylesheet" href="{{asset('assets/css/dashboard.css')}}" />
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

                    <h1 class="text-[30px] font-bold text-white ml-[138px] text-center flex-1">Meus Jogos</h1>

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
                    class="flex overflow-x-auto scroll-smooth mt-4 space-x-4 pb-4 no-scrollbar">
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

                <section class="bg-gray-900" >
                    <div class="flex flex-col items-center justify-center  bg-gray-950 w-full h-32 px-8 py-6">
                        <h1 class="text-[30px] mt-4 font-bold text-white text-center">Speedruns</h1>
                        <h4 class="text-gray-300 text-[18px] ">Categorias e Dicas</h4>
                    </div>

                    <div class="mt-[10px] justify-center items-center flex mr-[50px] ml-[50px]">
                        <div class="flex  h-[400px] overflow-hidden">

                            <a id="openpop1" href="#" class="group relative flex-1 transition-all duration-500 ease-in-out hover:basis-[60%] block">
                                <img src="https://img.freepik.com/premium-photo/rear-view-professional-gamer-finishing-mission-video-game-gaming-room_232070-15694.jpg" 
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="" />
                                
                                <span class="absolute bottom-6 left-6 text-white text-2xl font-bold opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                    Any%
                                </span>

                                
                            </a>

                            <a id="openpop2" href="#" class="group relative flex-1 transition-all duration-500 ease-in-out hover:basis-[60%] block">
                                <img src="https://tse2.mm.bing.net/th/id/OIP.cIpLY5ImBlW2CCRvum6M9QHaE-?rs=1&pid=ImgDetMain&o=7&rm=3" 
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="" />
                                
                                <span class="absolute bottom-6 left-6 text-white text-2xl font-bold opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                    100%
                                </span>
                            </a>

                            <a id="openpop3" href="#" class="group relative flex-1 transition-all duration-500 ease-in-out hover:basis-[60%] block">
                                <img src="https://gogamers.gg/wp-content/uploads/2023/04/jogador-na-cadeira-gamer-fazendo-transmissao-1024x640-optimized.png" 
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="" />
                                
                                <span class="absolute bottom-6 left-6 text-white text-2xl font-bold opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                    Low%
                                </span>
                            </a>

                            <a id="openpop4" href="#" class="group relative flex-1 transition-all duration-500 ease-in-out hover:basis-[60%] block">
                                <img src="https://static1.makeuseofimages.com/wordpress/wp-content/uploads/2019/07/video-game-glitches.jpg" 
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="" />
                                
                                <span class="absolute bottom-6 left-6 text-white text-2xl font-bold opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                    Glitchless
                                </span>
                            </a>

                            <a id="openpop5" href="#" class="group relative flex-1 transition-all duration-500 ease-in-out hover:basis-[60%] block">
                                <img src="https://clicportal.com.br/wp-content/uploads/2024/01/Gamer-Iniciante.jpg" 
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="" />
                
                                <span class="absolute bottom-6 left-6 text-white text-2xl font-bold opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                    TAS (Tool Assisted)
                                </span>
                            </a>

                            <a id="openpop6" href="#" class="group relative flex-1 transition-all duration-500 ease-in-out hover:basis-[60%] block">
                                <img src="https://img.freepik.com/premium-photo/professional-gamer-participates-team-play-computer-club_362389-5773.jpg" 
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="" />
                                
                                <span class="absolute bottom-6 left-6 text-white text-2xl font-bold opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                    RTA (Real Time)
                                </span>
                            </a>

                        </div>
                    </div>

{{-- -----------------------------------------------------Pop-up------------------------------------------------------------------ --}}
                       
                        <div id="myModal1" class="fixed inset-0 bg-black/60 flex items-center justify-center z-50 hidden">
                            <div class="bg-gray-900 text-white rounded-xl border-purple-700 border-4  shadow-lg w-96 p-6 relative">
                                <h2 class="text-2xl font-bold mb-3 text-purple-600 ">Any%</h2>
                                <p class="text-gray-300 mb-4">A categoria mais popular, que exige apenas que o jogador chegue ao final do jogo o mais rápido possível, utilizando quaisquer estratégias, atalhos ou falhas permitidas pela categoria.</p>
                                <button id="closeModal1" class="absolute top-3 right-3 text-gray-400 hover:text-white text-xl">&times;</button>
                            </div>
                        </div>

                        <div id="myModal2" class="fixed inset-0 bg-black/60 flex items-center justify-center z-50 hidden">
                            <div class="bg-gray-900 text-white border-purple-700 border-4 rounded-xl shadow-lg w-96 p-6 relative">
                                <h2 class="text-2xl font-bold mb-3 text-purple-600 ">100%</h2>
                                <p class="text-gray-300 mb-4">Exige que o jogador complete todo o conteúdo do jogo, como coletar todos os itens ou derrotar todos os chefes, antes de chegar ao final, resultando em speedruns geralmente mais longas.</p>
                                <button id="closeModal2" class="absolute top-3 right-3 text-gray-400 hover:text-white text-xl">&times;</button>
                            </div>
                        </div>

                        <div id="myModal3" class="fixed inset-0 bg-black/60 flex items-center justify-center z-50 hidden">
                            <div class="bg-gray-900 text-white border-purple-700 border-4 rounded-xl shadow-lg w-96 p-6 relative">
                                <h2 class="text-2xl font-bold mb-3 text-purple-600 ">Low%</h2>
                                <p class="text-gray-300 mb-4">O oposto de 100%, onde o objetivo é vencer o jogo completando a menor quantidade possível de objetivos ou coletando o mínimo de itens.</p>
                                <button id="closeModal3" class="absolute top-3 right-3 text-gray-400 hover:text-white text-xl">&times;</button>
                            </div>
                        </div>

                        <div id="myModal4" class="fixed inset-0 bg-black/60 flex items-center justify-center z-50 hidden">
                            <div class="bg-gray-900 text-white border-purple-700 border-4 rounded-xl shadow-lg w-96 p-6 relative">
                                <h2 class="text-2xl font-bold mb-3 text-purple-600 ">Glitchless</h2>
                                <p class="text-gray-300 mb-4">Uma variação que proíbe o uso de quaisquer falhas (glitches) para avançar pelo jogo, forçando os jogadores a completar o jogo apenas com as mecânicas padrão.</p>
                                <button id="closeModal4" class="absolute top-3 right-3 text-gray-400 hover:text-white text-xl">&times;</button>
                            </div>
                        </div>

                        <div id="myModal5" class="fixed inset-0 bg-black/60 flex items-center justify-center z-50 hidden">
                            <div class="bg-gray-900 text-white border-purple-700 border-4 rounded-xl shadow-lg w-96 p-6 relative">
                                <h2 class="text-2xl font-bold mb-3  text-purple-600 ">TAS (Tool-Assisted)</h2>
                                <p class="text-gray-300 mb-4">é um speedrun que utiliza ferramentas externas, como emuladores, para criar uma jogada "perfeita"</p>
                                <button id="closeModal5" class="absolute top-3 right-3 text-gray-400 hover:text-white text-xl">&times;</button>
                            </div>
                        </div>

                        <div id="myModal6" class="fixed inset-0 bg-black/60 flex items-center justify-center z-50 hidden">
                            <div class="bg-gray-900 text-white border-purple-700 border-4 rounded-xl shadow-lg w-96 p-6 relative">
                                <h2 class="text-2xl font-bold mb-3 text-purple-600 ">RTA (Real Time Attack)</h2>
                                <p class="text-gray-300 mb-4">é um speedrun feito por um jogador humano em tempo real, sem a ajuda de ferramentas.</p>
                                <button id="closeModal6" class="absolute top-3 right-3 text-gray-400 hover:text-white text-xl">&times;</button>
                            </div>
                        </div>
{{-- ---------------------------------------------------------------------------------------------------------------------------- --}}


        </div>
    </x-app-layout>

    <script src="{{ asset('assets/js/dashboard.js') }}"></script>

</body>
</html>
