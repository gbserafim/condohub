<body class="font-sans antialiased bg-[#e0f2fe] flex items-center justify-center min-h-screen text-gray-800">
    <div class="w-full sm:max-w-md px-6 py-8 bg-white shadow-lg overflow-hidden sm:rounded-lg border border-gray-200">
        {{-- Sua logo --}}
        <div class="flex justify-center mb-6">
            <img src="{{ asset('assets/logo.png') }}" alt="Logo CondoHub" class="w-[40px] h-[40px]">
        </div>

        {{ $slot }}
    </div>
</body>