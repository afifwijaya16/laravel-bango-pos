<header class="bg-white shadow-md p-4 z-10">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-xl font-bold text-gray-800"><i class="fa-solid fa-location-dot text-emerald-500"></i> Food
                Truck
                Jajanan Bango
                ({{ session('outlet') }})</h1>
        </div>
        <div class="flex items-center space-x-4">
            <button class="text-gray-600"><i class="fas fa-bell fa-lg"></i></button>
            <button class="text-gray-600"><i class="fas fa-cog fa-lg"></i></button>
            <div class="flex items-center">
                <div class="w-10 h-10 bg-gray-300 rounded-full mr-3"></div>
                <div>
                    <p class="font-semibold text-gray-800">Hi, {{ Auth::user()->name }}</p>
                    <p class="text-sm text-gray-500">Kasir</p>
                </div>
            </div>
        </div>
    </div>
</header>
