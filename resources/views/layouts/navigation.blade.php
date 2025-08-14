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
