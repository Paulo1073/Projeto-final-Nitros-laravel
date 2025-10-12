<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="m-0 p-0 box-border relative">
  <nav class=" gap-6 ml-190 flex justify-end items-end absolute top-14  w-100 z-50 bg-transparent">
    @auth
        <a class="text-white ml-18 px-4 py-1 border border-white border-opacity-50 transition-colors duration-300 ease-in-out hover:border-white" href="{{ url('/dashboard') }}">Dashboard</a>
    @else
         <a class="text-white transition-colors duration-300 ease-in-out  px-4 py-1 border border-transparent hover:border-white" href="{{ route('login') }}">Login</a>

         @if (Route::has('register'))
            <a class="text-white px-4 py-1 border border-white border-opacity-50 transition-colors duration-300 ease-in-out hover:border-white" href="{{ route('register') }}">Register</a>
         @endif
    @endauth
  </nav>

  <div class="min-h-screen bg-center bg-cover" 
       style="background-image: url('{{ asset('assets/images/FND.png') }}');">
  </div>
</body>
</html>
