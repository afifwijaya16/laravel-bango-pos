<aside class="w-20 bg-white shadow-xl flex flex-col justify-between items-center py-6">
    <div class="flex flex-col items-center space-y-4">
        <div class="w-12 h-12 bg-emerald-500 rounded-xl flex items-center justify-center text-white">
            <i class="fas fa-shopping-bag"></i>
        </div>
        <a href="{{ route('dashboard.index') }}"
            class="w-12 h-12 {{ request()->routeIs('dashboard.*') ? 'bg-orange-500 text-gray-100' : 'bg-gray-200' }} rounded-xl flex items-center justify-center cursor-pointer">
            <i class="fa fa-bars"></i>
        </a>
        <a href="{{ route('outlet.index') }}"
            class="w-12 h-12 {{ request()->routeIs('outlet.*') ? 'bg-orange-500 text-gray-100' : 'bg-gray-200' }} rounded-xl flex items-center justify-center cursor-pointer">
            <i class="fa-solid fa-caravan"></i>
        </a>
    </div>
    <div
        class="w-12 h-12 bg-gray-200 hover:bg-gray-300 rounded-xl flex items-center justify-center text-gray-500 cursor-pointer">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
            </a>
        </form>
    </div>
</aside>
