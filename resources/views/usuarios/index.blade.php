<x-dashboard-layout>
    <div class="bg-white p-6 shadow-sm rounded-lg">
        <h1 class="text-2xl font-bold text-gray-800">Gerenciar Usuários</h1>
        <p class="mt-4 text-gray-600">
            Aqui é onde o administrador verá a lista de usuários do sistema.
        </p>

        <div class="mt-6">
            <h3 class="text-lg font-semibold text-gray-700">Usuários Cadastrados</h3>
            @if($users->isEmpty())
                <p class="mt-2 text-gray-500">Nenhum usuário cadastrado ainda.</p>
            @else
                <ul class="mt-4 space-y-2">
                    @foreach($users as $user)
                        <li class="bg-gray-100 p-4 rounded-lg shadow-sm">
                            <p class="font-medium">{{ $user->name }}</p>
                            <p class="text-sm text-gray-600">{{ $user->email }}</p>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</x-dashboard-layout>