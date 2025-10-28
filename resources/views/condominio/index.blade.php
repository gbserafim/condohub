<x-dashboard-layout>
    <div class="bg-white p-6 shadow-sm rounded-lg">
        <h1 class="text-2xl font-bold text-gray-800">Gerenciar Condomínios</h1>
        <p class="mt-4 text-gray-600">
            Aqui é onde o administrador verá a lista de condomínios cadastrados.
        </p>
        
        <div class="mt-4">
            <a href="{{ route('condominio.create') }}" class="inline-flex items-center px-4 py-2 bg-[#0057ab] text-white rounded-lg hover:bg-[#004080]">
                + Adicionar Condomínio
            </a>
        </div>
        
        <div class="mt-6">
            <h3 class="text-lg font-semibold text-gray-700">Condomínios Cadastrados</h3>
            @if($condominios->isEmpty())
                <p class="mt-2 text-gray-500">Nenhum condomínio cadastrado ainda.</p>
            @else
                <ul class="mt-4 space-y-2">
                    @foreach($condominios as $condominio)
                        <li class="bg-gray-100 p-4 rounded-lg shadow-sm">
                            <p class="font-medium">{{ $condominio->nome }}</p>
                            <p class="text-sm text-gray-600">{{ $condominio->endereco }}, {{ $condominio->numero }} - {{ $condominio->cidade }}/{{ $condominio->estado }}</p>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="mt-8 border-t pt-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Convidar Moradores</h2>

            @if(session('invite_token'))
                @php
                    $inviteUrl = url('register') . '?invite=' . session('invite_token');
                @endphp

                <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4 flex justify-between items-center" role="alert">
                    <div>
                        <p class="font-bold">Link de Convite Ativo:</p>
                        <input type="text" id="invite-link" value="{{ $inviteUrl }}" readonly class="bg-transparent border-none p-0 w-full text-sm break-words focus:ring-0">
                    </div>
                    
                    <button onclick="copyToClipboard()" class="ml-4 px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition">
                        Copiar
                    </button>
                </div>
            @endif

            @if(Auth::user()->condominio_id)
                <form method="POST" action="{{ route('condominio.invite.generate') }}">
                    @csrf
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 disabled:opacity-50">
                        Gerar Novo Link de Convite
                    </button>
                </form>
            @else
                <p class="text-red-500">Você não tem um condomínio associado para gerar convites.</p>
            @endif
            
            @if ($errors->any())
                <div class="text-red-500 mt-4">
                    {{ $errors->first('error') }}
                </div>
            @endif
        </div>
    </div>

    <script>
        function copyToClipboard() {
            const copyText = document.getElementById("invite-link");
            
            // Tenta usar a API moderna (navigator.clipboard)
            if (navigator.clipboard) {
                navigator.clipboard.writeText(copyText.value).then(() => {
                    alert("Link copiado para a área de transferência!");
                }).catch(err => {
                    // Fallback para métodos mais antigos se a API falhar
                    copyText.select();
                    copyText.setSelectionRange(0, 99999);
                    document.execCommand("copy");
                    alert("Link copiado para a área de transferência!");
                });
            } else {
                // Método antigo
                copyText.select();
                copyText.setSelectionRange(0, 99999);
                document.execCommand("copy");
                alert("Link copiado para a área de transferência!");
            }
        }
    </script>
</x-dashboard-layout>