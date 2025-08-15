<aside class="bg-white w-20 flex flex-col items-center py-6 shadow-lg z-20">
    <div class="bg-emerald-600 text-white font-bold text-2xl p-3 rounded-lg mb-8">FJB</div>
    <nav class="flex flex-col items-center space-y-6">
        <a href="{{ route('dashboard.index') }}"
            class="p-3  {{ request()->routeIs('dashboard.*') ? 'bg-emerald-100 text-emerald-600' : 'text-gray-500 hover:bg-gray-200' }} rounded-lg">
            <i class="fas fa-th-large fa-lg"></i>
        </a>
        <a href="{{ route('outlet.index') }}"
            class="p-3 {{ request()->routeIs('outlet.*') ? 'bg-emerald-100 text-emerald-600' : 'text-gray-500 hover:bg-gray-200' }}   rounded-lg">
            <i class="fa-solid fa-caravan fa-lg"></i>
        </a>
        <a href="{{ route('category.index') }}"
            class="p-3 {{ request()->routeIs('category.*') ? 'bg-emerald-100 text-emerald-600' : 'text-gray-500 hover:bg-gray-200' }}   rounded-lg">
            <i class="fa-solid fa-tag fa-lg"></i>
        </a>
        <a href="{{ route('product.index') }}"
            class="p-3 {{ request()->routeIs('product.*') ? 'bg-emerald-100 text-emerald-600' : 'text-gray-500 hover:bg-gray-200' }}   rounded-lg">
            <i class="fa-solid fa-gift fa-lg"></i>
        </a>
    </nav>
    <div class="mt-auto">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                class="p-3 text-gray-500 hover:bg-red-100 hover:text-red-500 rounded-lg">
                <i class="fas fa-sign-out-alt fa-lg"></i>
            </a>
        </form>
    </div>
</aside>
