<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        <div>
            <button>Login</button>
        </div>
    </header>
    <div class="min-h-screen bg-cover bg-center"
     style="background-image: url('{{ asset('assets/images/FND.png') }}');">
    </div>

</body>
</html>