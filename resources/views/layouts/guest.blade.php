<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CondoHub') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-white">
    <div class="min-h-screen flex">
        
        <!-- Lado esquerdo azul com logo -->
        <div class="w-1/2 bg-[#0057ab] flex items-center justify-center p-8">
            <img src="{{ asset('assets/logo.png') }}" alt="Logo CondoHub" class="w-2/3 max-w-sm">
        </div>

        <!-- Lado direito branco -->
        <div class="w-1/2 flex items-center justify-center p-8">
            <div class="w-full max-w-sm">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>
</html>
