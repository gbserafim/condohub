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
    </div>
</x-dashboard-layout>