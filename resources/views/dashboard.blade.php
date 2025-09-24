<x-dashboard-layout>
    <div class="bg-white p-6 shadow-sm rounded-lg">
        <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
        <p class="mt-4 text-gray-600">
            Bem-vindo, {{ Auth::user()->name }}. Esta é a sua dashboard.
        </p>
    </div>
</x-dashboard-layout>