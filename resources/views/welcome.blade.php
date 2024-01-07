<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
</head>

<body class="antialiased">
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            @auth
            <a href="{{ route('/dashboard') }}" class="font-semibold text-xl text-pink-600 hover:text-pink-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-blue-900 p-2">Panel</a>
            @else
            <a href="{{ route('login') }}" class="font-semibold text-xl text-pink-600 hover:text-pink-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-blue-900 p-2">Logowanie</a>
            <!-- BRAK MOŻLIWOŚCI REJESTRACJI! TYLKO ADMIN DODAJE KONTA -->
            <!-- @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
            @endif -->
            @endauth
        </div>
        @endif

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex-col items-center">
                <p class="text-4xl text-pink-600 pb-10">Aplikacja dziennik lekcyjny WSB 2024</p>
                <img src="{{ URL::asset('/img/dziennik.jpg') }}" alt="dziennik" style="border-radius: 10px; transform:rotate(5deg);" width="320px" class="mx-auto">
            </div>
        </div>
</body>

</html>