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
<body class="font-sans antialiased">
    <div class="flex h-screen bg-gray-100">

        <aside class="flex flex-col w-64 h-full bg-white border-r">
            <div class="flex items-center justify-center h-16 bg-white border-b">
                <span class="font-bold text-xl text-[#0057ab]">CondoHub</span>
            </div>
            
            <nav class="flex-1 overflow-y-auto">
                <ul class="p-2">
                    <li class="px-2 py-2 text-gray-700 hover:bg-gray-200 rounded-lg">
                        <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
                            <span>Dashboard</span>
                        </a>
                    </li>
                    @if(Auth::user()->is_admin)
                        <li class="px-2 py-2 text-gray-700 hover:bg-gray-200 rounded-lg">
                            <a href="{{ route('condominio.index') }}" class="flex items-center space-x-2">
                                <span>Condomínios</span>
                            </a>
                        </li>
                        <li class="px-2 py-2 text-gray-700 hover:bg-gray-200 rounded-lg">
                            <a href="{{ route('usuarios.index') }}" class="flex items-center space-x-2">
                                <span>Usuários</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
        </aside>

        <main class="flex-1 p-6 overflow-y-auto">
            {{ $slot }}
        </main>
    </div>
</body>
</html>