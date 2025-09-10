<x-guest-layout>
    <div class="mb-8 text-center">
        <h1 class="text-2xl font-bold text-[#0057ab]">Login</h1>
        <p class="text-gray-500 mt-1 text-sm">Sign in to continue.</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="space-y-4">
            <div>
                <label for="email" class="block text-xs font-semibold text-[#0057ab] uppercase mb-1">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    placeholder="Enter your email"
                    class="block w-full rounded-lg border-gray-300 bg-gray-100 text-sm shadow-sm px-3 py-2
                        focus:ring-[#0057ab] focus:border-[#0057ab]">
            </div>

            <div>
                <label for="password" class="block text-xs font-semibold text-[#0057ab] uppercase mb-1">Password</label>
                <input id="password" type="password" name="password" required
                    placeholder="Enter your password"
                    class="block w-full rounded-lg border-gray-300 bg-gray-100 text-sm shadow-sm px-3 py-2
                        focus:ring-[#0057ab] focus:border-[#0057ab]">
            </div>
        </div>

        <div class="mt-6">
            <button type="submit"
                class="w-full py-2 bg-[#0057ab] rounded-lg font-semibold text-white uppercase tracking-wide
                    hover:bg-[#004080] focus:ring-2 focus:ring-offset-2 focus:ring-[#0057ab] transition">
                Log in
            </button>
        </div>
    </form>
</x-guest-layout>   