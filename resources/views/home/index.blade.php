<x-app-layout>
    <div class="flex h-screen overflow-hidden">
        <aside class="w-20 bg-white shadow-xl flex flex-col justify-between items-center py-6">
            <div class="flex flex-col items-center space-y-4">
                <div class="w-12 h-12 bg-emerald-500 rounded-xl flex items-center justify-center text-white">
                    <i class="fas fa-shopping-bag"></i>
                </div>
                <div
                    class="w-12 h-12 bg-gray-200 rounded-xl flex items-center justify-center text-gray-500 cursor-pointer">
                    <i class="fa fa-bars"></i>
                </div>
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

        <main class="flex-1 p-6 overflow-y-auto custom-scrollbar">
            <header class="flex justify-between items-center mb-6 bg-white p-5 rounded-xl">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800"> <i class="fa-solid fa-location-pin"></i> Food Truck
                        Jajanan Bango JKT</h1>
                </div>
                <div class="flex items-center space-x-2 text-gray-500">
                    <p class="font-semibold">Hi, {{ Auth::user()->name }}</p>
                    <div class="w-8 h-8 rounded-full bg-gray-300"></div>
                </div>
            </header>

            <div class="flex items-center justify-between space-x-6 border-b border-gray-300 pb-2 mb-6">
                <nav class="flex  space-x-4 text-sm font-semibold">
                    <a href="#" class="pb-2 border-b-2 border-blue-500 text-blue-500">Semua</a>
                    <a href="#" class="pb-2 text-gray-500 hover:text-blue-500">Makanan</a>
                    <a href="#" class="pb-2 text-gray-500 hover:text-blue-500">Minuman</a>
                </nav>
                <div class="relative flex-1 max-w-xs ml-auto">
                    <input type="text" placeholder="Cari Item"
                        class="w-full pl-10 pr-4 py-2 border border-orange-300 rounded-lg focus:outline-none focus:border-orange-300 focus:ring-2 focus:ring-orange-500">
                    <i
                        class="fa fa-search h-5 w-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2"></i>
                </div>
            </div>

            <h2 class="text-lg font-bold text-gray-800 mb-4">Pilih Item</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="bg-gray-200 h-40 flex items-center justify-center text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">Mienta Bakmi</h3>
                        <p class="text-xl font-bold text-gray-900 mt-1">Rp 25.000</p>
                        <p class="text-xs text-gray-500 mt-2">Tersedia <span class="font-semibold">20 item</span></p>
                        <button
                            class="mt-4 w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-lg flex items-center justify-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            <span>Tambahkan</span>
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="bg-gray-200 h-40 flex items-center justify-center text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">Nasi Goreng Saikoro</h3>
                        <p class="text-xl font-bold text-gray-900 mt-1">Rp 30.000</p>
                        <p class="text-xs text-gray-500 mt-2">Tersedia <span class="font-semibold">20 item</span></p>
                        <button
                            class="mt-4 w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-lg flex items-center justify-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            <span>Tambahkan</span>
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="bg-gray-200 h-40 flex items-center justify-center text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">Roti Mochi Ayam Kecap</h3>
                        <p class="text-xl font-bold text-gray-900 mt-1">Rp 25.000</p>
                        <p class="text-xs text-gray-500 mt-2">Tersedia <span class="font-semibold">20 item</span></p>
                        <button
                            class="mt-4 w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-lg flex items-center justify-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            <span>Tambahkan</span>
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="bg-gray-200 h-40 flex items-center justify-center text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">Iced Coffee Malika</h3>
                        <p class="text-xl font-bold text-gray-900 mt-1">Rp 25.000</p>
                        <p class="text-xs text-gray-500 mt-2 text-red-500">Habis <span class="font-semibold">0
                                item</span></p>
                        <button
                            class="mt-4 w-full bg-gray-300 text-gray-500 font-bold py-2 px-4 rounded-lg cursor-not-allowed flex items-center justify-center space-x-2"
                            disabled>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            <span>Tambahkan</span>
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
