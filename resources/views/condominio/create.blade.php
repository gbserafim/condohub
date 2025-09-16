<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastrar Condomínio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('condominio.store') }}">
                        @csrf

                        <div>
                            <label for="nome" class="block font-medium text-sm text-gray-700">Nome do Condomínio</label>
                            <input id="nome" type="text" name="nome" value="{{ old('nome') }}" required autofocus
                                class="block w-full rounded-lg border-gray-300 bg-gray-100 text-sm shadow-sm px-3 py-2
                                    focus:ring-[#0057ab] focus:border-[#0057ab]">
                        </div>

                        <div class="mt-4">
                            <label for="endereco" class="block font-medium text-sm text-gray-700">Endereço</label>
                            <input id="endereco" type="text" name="endereco" value="{{ old('endereco') }}" required
                                class="block w-full rounded-lg border-gray-300 bg-gray-100 text-sm shadow-sm px-3 py-2
                                    focus:ring-[#0057ab] focus:border-[#0057ab]">
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit"
                                class="px-4 py-2 bg-[#0057ab] rounded-lg font-semibold text-white uppercase tracking-wide
                                    hover:bg-[#004080] focus:ring-2 focus:ring-offset-2 focus:ring-[#0057ab] transition">
                                Cadastrar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>