<x-guest-layout>
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h2 class="text-center text-xl font-bold mb-1">Welcome Back</h2>
        <p class="text-center text-gray-500 text-sm mb-6">Login to access POS system</p>
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <x-input-label for="username" :value="__('Username')" />
                <div class="relative mt-1">
                    <i class="fa fa-user absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <input type="text" id="username" name="username" value="{{ old('username') }}" required autofocus
                        autocomplete="username"
                        class="pl-10 border-gray-300 rounded-md shadow-sm block w-full focus:border-orange-500 focus:ring-orange-500">
                </div>
                <x-input-error :messages="$errors->get('username')" class="mt-2" />
            </div>
            <div class="flex items-center mt-4">
                <button
                    class="w-full bg-orange-600 text-white py-2 px-4 rounded-md hover:bg-orange-700 transition duration-200 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>
    </div>
    <p class="text-center text-gray-400 text-xs mt-6">POS System V1.0</p>
</x-guest-layout>
