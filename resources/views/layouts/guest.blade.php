<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div
        style="padding: 50px"
        class="min-h-screen flex flex-col sm:justify-top items-center pt-6 sm:pt-0 bg-gradient-to-br from-amber-400 to-amber-300">
        <div>
            <img src="{{ asset('images/logoGuest.png') }}" class="" alt="">
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 dark:bg-[#161615] shadow-xl overflow-hidden sm:rounded-lg ">
            {{ $slot }}
        </div>
    </div>
</body>

</html>