<x-guest-layout>

    @if(session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    
    <div class="mb-8 text-center">
        <h1 class="text-2xl font-bold text-[#0057ab]">Registrar</h1>
        <p class="text-gray-500 mt-1 text-sm">Crie sua conta para começar.</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- Campo oculto para o token de convite --}}
        @if(request()->query('invite'))
            <input type="hidden" name="invite_token" value="{{ request()->query('invite') }}">
        @endif
        {{-- Fim do Campo Oculto --}}

        <div class="space-y-4">
            <div>
                <label for="name" class="block text-xs font-semibold text-[#0057ab] uppercase mb-1">Nome</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                    class="block w-full rounded-lg border-gray-300 bg-gray-100 text-sm shadow-sm px-3 py-2
                        focus:ring-[#0057ab] focus:border-[#0057ab]">
            </div>

            <div>
                <label for="email" class="block text-xs font-semibold text-[#0057ab] uppercase mb-1">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    class="block w-full rounded-lg border-gray-300 bg-gray-100 text-sm shadow-sm px-3 py-2
                        focus:ring-[#0057ab] focus:border-[#0057ab]">
            </div>

            <div>
                <label for="password" class="block text-xs font-semibold text-[#0057ab] uppercase mb-1">Senha</label>
                <input id="password" type="password" name="password" required
                    class="block w-full rounded-lg border-gray-300 bg-gray-100 text-sm shadow-sm px-3 py-2
                        focus:ring-[#0057ab] focus:border-[#0057ab]">
            </div>

            <div>
                <label for="password_confirmation" class="block text-xs font-semibold text-[#0057ab] uppercase mb-1">Confirmar Senha</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    class="block w-full rounded-lg border-gray-300 bg-gray-100 text-sm shadow-sm px-3 py-2
                        focus:ring-[#0057ab] focus:border-[#0057ab]">
            </div>
            
            <div>
                <label for="bloco" class="block text-xs font-semibold text-[#0057ab] uppercase mb-1">Bloco / Torre</label>
                <input id="bloco" type="text" name="bloco" value="{{ old('bloco') }}" required
                    class="block w-full rounded-lg border-gray-300 bg-gray-100 text-sm shadow-sm px-3 py-2
                        focus:ring-[#0057ab] focus:border-[#0057ab]">
            </div>

            <div>
                <label for="unidade" class="block text-xs font-semibold text-[#0057ab] uppercase mb-1">Unidade / Apto</label>
                <input id="unidade" type="text" name="unidade" value="{{ old('unidade') }}" required
                    class="block w-full rounded-lg border-gray-300 bg-gray-100 text-sm shadow-sm px-3 py-2
                        focus:ring-[#0057ab] focus:border-[#0057ab]">
            </div>
        </div>

        <div class="mt-6">
            <button type="submit"
                class="w-full py-2 bg-[#0057ab] rounded-lg font-semibold text-white uppercase tracking-wide
                    hover:bg-[#004080] focus:ring-2 focus:ring-offset-2 focus:ring-[#0057ab] transition">
                Registrar
            </button>
        </div>
    </form>

    <div class="mt-6 text-center">
        <a href="{{ route('login') }}" class="underline text-sm text-[#0057ab] hover:text-[#004080]">
            Já tem uma conta?
        </a>
    </div>
</x-guest-layout>