<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('login') }}">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-gray-800">Food Truck Jajanan Bango</h1>
        </div>
        <h2 class="text-2xl font-semibold text-gray-700 text-center">Login</h2>
        @csrf
        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="email" name="username" :value="old('username')"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <div class="flex items-center mt-4">
            <button
                class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                {{ __('Log in') }}
            </button>
        </div>
        <div class="mt-8 text-center text-sm text-gray-500">
            POS System V1.0
        </div>
    </form>
</x-guest-layout>
