<x-guest-layout>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Campo de E-mail -->
        <div>
            <x-text-input id="email" class="block w-full" type="email" name="email"
                :value="old('email')" required autofocus autocomplete="username" placeholder="E-mail" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Campo de Senha -->
        <div class="mt-4">
            <x-text-input id="password" class="block w-full" type="password" name="password"
                required autocomplete="current-password" placeholder="Senha" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Checkbox "Lembrar de mim" -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-[#0057ab] shadow-sm focus:ring-[#0057ab]"
                    name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Lembrar de mim') }}</span>
            </label>
        </div>

        <!-- Ações: Esqueceu a senha + Botão Entrar -->
        <div class="flex items-center justify-between mt-4">
            <a class="underline text-sm text-[#0057ab] hover:text-[#003d7a] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0057ab]"
                href="{{ route('password.request') }}">
                {{ __('Esqueceu a senha?') }}
            </a>

            <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-[#0057ab] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#003d7a] focus:bg-[#003d7a] active:bg-[#003d7a] focus:outline-none focus:ring-2 focus:ring-[#0057ab] focus:ring-offset-2 transition ease-in-out duration-150">
                {{ __('Entrar') }}
            </button>
        </div>
    </form>

    <!-- Link para registro -->
    <div class="mt-4 text-center"></div>
        <a class="underline text-sm text-[#0057ab] hover:text-[#003d7a] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0057ab]"
            href="{{ route('register') }}">
            {{ __('Não possui uma conta? Cadastre-se') }}
        </a>
    </div>
</x-guest-layout>