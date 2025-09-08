<div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6 max-w-sm mx-auto">
    <h2 class="text-xl font-semibold text-gray-900 mb-2">{{ $title }}</h2>
    <p class="text-gray-600 mb-4">{{ $slot }}</p>
    <div class="mt-4">
        {{ $footer ?? '' }}
    </div>
</div>