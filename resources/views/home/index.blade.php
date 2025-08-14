<x-app-layout>
    <div class="flex items-center justify-between space-x-6 border-b border-gray-300 pb-2 mb-6">
        <nav class="flex  space-x-4 text-sm font-semibold">
            <a href="#" class="pb-2 border-b-2 border-blue-500 text-blue-500">Semua</a>
            <a href="#" class="pb-2 text-gray-500 hover:text-blue-500">Makanan</a>
            <a href="#" class="pb-2 text-gray-500 hover:text-blue-500">Minuman</a>
        </nav>
        <div class="relative flex-1 max-w-xs ml-auto">
            <input type="text" placeholder="Cari Item"
                class="w-full pl-10 pr-4 py-2 border border-orange-300 rounded-lg focus:outline-none focus:border-orange-300 focus:ring-2 focus:ring-orange-500">
            <i class="fa fa-search h-5 w-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2"></i>
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
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
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
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
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Tambahkan</span>
                </button>
            </div>
        </div>
    </div>
</x-app-layout>
