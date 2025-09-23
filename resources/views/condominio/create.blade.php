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
                    <form method="POST" action="{{ route('condominio.store') }}" id="form-condominio">
                        @csrf

                        <div>
                            <label for="nome" class="block font-medium text-sm text-gray-700">Nome do Condomínio</label>
                            <input id="nome" type="text" name="nome" value="{{ old('nome') }}" required autofocus
                                class="block w-full rounded-lg border-gray-300 bg-gray-100 text-sm shadow-sm px-3 py-2
                                    focus:ring-[#0057ab] focus:border-[#0057ab]">
                        </div>

                        <div class="mt-4">
                            <label for="cep" class="block font-medium text-sm text-gray-700">CEP</label>
                            <input id="cep" type="text" name="cep" value="{{ old('cep') }}" required
                                class="block w-full rounded-lg border-gray-300 bg-gray-100 text-sm shadow-sm px-3 py-2
                                    focus:ring-[#0057ab] focus:border-[#0057ab]">
                        </div>

                        <div class="mt-4">
                            <label for="endereco" class="block font-medium text-sm text-gray-700">Endereço</label>
                            <input id="endereco" type="text" name="endereco" value="{{ old('endereco') }}" required readonly
                                class="block w-full rounded-lg border-gray-300 bg-gray-100 text-sm shadow-sm px-3 py-2
                                    focus:ring-[#0057ab] focus:border-[#0057ab]">
                        </div>

                        <div class="mt-4">
                            <label for="numero" class="block font-medium text-sm text-gray-700">Número</label>
                            <input id="numero" type="text" name="numero" value="{{ old('numero') }}" required
                                class="block w-full rounded-lg border-gray-300 bg-gray-100 text-sm shadow-sm px-3 py-2
                                    focus:ring-[#0057ab] focus:border-[#0057ab]">
                        </div>
                        
                        <div class="mt-4">
                            <label for="bairro" class="block font-medium text-sm text-gray-700">Bairro</label>
                            <input id="bairro" type="text" name="bairro" value="{{ old('bairro') }}" required readonly
                                class="block w-full rounded-lg border-gray-300 bg-gray-100 text-sm shadow-sm px-3 py-2
                                    focus:ring-[#0057ab] focus:border-[#0057ab]">
                        </div>

                        <div class="mt-4">
                            <label for="cidade" class="block font-medium text-sm text-gray-700">Cidade</label>
                            <input id="cidade" type="text" name="cidade" value="{{ old('cidade') }}" required readonly
                                class="block w-full rounded-lg border-gray-300 bg-gray-100 text-sm shadow-sm px-3 py-2
                                    focus:ring-[#0057ab] focus:border-[#0057ab]">
                        </div>

                        <div class="mt-4">
                            <label for="estado" class="block font-medium text-sm text-gray-700">Estado</label>
                            <input id="estado" type="text" name="estado" value="{{ old('estado') }}" required readonly
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

    <script>
        console.log("Script para preencher o CEP carregado.");
        document.addEventListener('DOMContentLoaded', function() {
            console.log("DOM completamente carregado.");
            const cepInput = document.getElementById('cep');

            cepInput.addEventListener('blur', function() {
                const cep = cepInput.value.replace(/\D/g, '');
                console.log("CEP digitado:", cep);
                
                if (cep.length === 8) {
                    fetch(`https://viacep.com.br/ws/${cep}/json/`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Erro de rede.');
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (!data.erro) {
                                console.log("Dados do CEP recebidos:", data);
                                document.getElementById('endereco').value = data.logradouro;
                                document.getElementById('bairro').value = data.bairro;
                                document.getElementById('cidade').value = data.localidade;
                                document.getElementById('estado').value = data.uf;
                                document.getElementById('numero').focus();
                            } else {
                                console.log("CEP não encontrado.");
                            }
                        })
                        .catch(error => console.error('Erro ao buscar CEP:', error));
                }
            });
        });
    </script>
</x-app-layout>