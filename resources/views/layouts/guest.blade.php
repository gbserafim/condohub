<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'CondoHub') }}</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased font-sans bg-white min-h-screen">
  <div class="min-h-screen flex">
    {{-- LADO ESQUERDO: imagem/logo (apenas visual) --}}
    <div class="w-1/2 bg-[#0057ab] flex items-center justify-center p-12">
      <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="max-w-[70%] h-auto object-contain">
    </div>

    {{-- LADO DIREITO: área branca com conteúdo centralizado --}}
    <div class="w-1/2 flex items-center justify-center p-12">
      {{-- card branco restrito a largura pequena para ficar igual à referência --}}
      <div class="w-full max-w-xs bg-white">
        {{ $slot }}
      </div>
    </div>
  </div>
</body>
</html>
