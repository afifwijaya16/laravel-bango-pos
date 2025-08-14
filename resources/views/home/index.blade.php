<x-app-layout>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6 main-content">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 lg:col-span-8">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-bold text-gray-800">List Product</h2>
                    <div class="flex items-center space-x-2">
                        <div class="relative">
                            <input type="text" placeholder="Search product"
                                class="pl-10 pr-4 py-2 border-white bg-white focus:border-white focus:ring-white rounded-lg w-full md:w-64">
                            <i
                                class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                        <button class="flex items-center px-4 py-2 border bg-white rounded-lg">
                            <i class="fas fa-filter mr-2 text-gray-400"></i>
                            Filter
                        </button>
                    </div>
                </div>
                <div class="flex space-x-2 border-b mb-6 bg-white p-2 rounded-md">
                    <button class="px-4 py-2 text-white bg-emerald-600 rounded-full">All Product</button>
                    <button class="px-4 py-2 text-gray-500">Food</button>
                    <button class="px-4 py-2 text-gray-500">Side Dishes</button>
                    <button class="px-4 py-2 text-gray-500">Drink</button>
                </div>
                <div id="product-list"
                    class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 overflow-y-auto h-[600px]">
                </div>
            </div>

            <div class="col-span-12 lg:col-span-4">
                <div class="bg-white rounded-lg shadow p-6 sticky">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold text-gray-800"><i class="fa-solid fa-clipboard-list"></i> Order
                            #00001</h3>
                        <button class="text-red-500 font-semibold text-sm"><i class="fas fa-repeat mr-1"></i>Reset
                            Order</button>
                    </div>
                    <div class="flex mb-4 gap-2">
                        <button class="p-2 text-center bg-emerald-600 text-white rounded-lg font-semibold">
                            Dine In
                        </button>
                        <button
                            class="p-2 text-center bg-emerald-100 text-emerald-500 border border-emerald-500 rounded-lg font-semibold">
                            Take Away
                        </button>
                    </div>
                    <div id="order-items" class="space-y-4 mb-4 h-[400px] overflow-y-auto pr-2">
                    </div>
                    <div class="border-t pt-4">
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <p class="text-gray-600">Subtotal</p>
                                <p id="subtotal" class="font-semibold text-gray-800">Rp0</p>
                            </div>
                            <div class="flex justify-between">
                                <p class="text-gray-600">Service Charge 5%</p>
                                <p id="service-charge" class="font-semibold text-gray-800">Rp0</p>
                            </div>
                            <div class="flex justify-between">
                                <p class="text-gray-600">PBT 10%</p>
                                <p id="tax" class="font-semibold text-gray-800">Rp0</p>
                            </div>
                        </div>
                        <div class="flex justify-between items-center mt-4 pt-4 border-t">
                            <p class="font-bold text-lg text-gray-800">Total Payment</p>
                            <p id="total-payment" class="font-bold text-lg text-emerald-600">Rp0</p>
                        </div>
                        <button
                            class="w-full bg-emerald-600 text-white py-3 rounded-lg mt-4 font-bold text-base">Continue
                            Payment <i class="fas fa-arrow-right ml-2"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        const products = [{
                id: 1,
                name: 'Nasi Goreng Kambing',
                price: 45000,
                stock: 20,
                image: 'https://images.unsplash.com/photo-1585032226651-759b368d7246?q=80&w=1892&auto=format&fit=crop'
            },
            {
                id: 2,
                name: 'Nasi Goreng Pete',
                price: 32000,
                stock: 10,
                image: 'https://images.unsplash.com/photo-1585032226651-759b368d7246?q=80&w=1892&auto=format&fit=crop'
            },
            {
                id: 3,
                name: 'Mie Ayam Jamur',
                price: 25000,
                stock: 20,
                image: 'https://images.unsplash.com/photo-1585032226651-759b368d7246?q=80&w=1892&auto=format&fit=crop'
            },
            {
                id: 4,
                name: 'Kwetiau Goreng Seafood',
                price: 40000,
                stock: 20,
                image: 'https://images.unsplash.com/photo-1585032226651-759b368d7246?q=80&w=1892&auto=format&fit=crop'
            },
            {
                id: 5,
                name: 'Es Teh Manis',
                price: 7000,
                stock: 100,
                image: 'https://images.unsplash.com/photo-1585032226651-759b368d7246?q=80&w=1892&auto=format&fit=crop'
            },
            {
                id: 6,
                name: 'Es Kopi Susu Gula Aren',
                price: 15000,
                stock: 50,
                image: 'https://images.unsplash.com/photo-1585032226651-759b368d7246?q=80&w=1892&auto=format&fit=crop'
            },
            {
                id: 7,
                name: 'Ayam Bakar Kalasan',
                price: 17000,
                stock: 50,
                image: 'https://images.unsplash.com/photo-1585032226651-759b368d7246?q=80&w=1892&auto=format&fit=crop'
            },
            {
                id: 8,
                name: 'Nasi Goreng Babat',
                price: 40000,
                stock: 20,
                image: 'https://images.unsplash.com/photo-1585032226651-759b368d7246?q=80&w=1892&auto=format&fit=crop'
            },
        ];
        let order = [];
        const formatRupiah = (n) => new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(n);

        function renderProducts() {
            const list = document.getElementById('product-list');
            list.innerHTML = '';
            products.forEach(p => {
                list.innerHTML += `
                    <div class="bg-white rounded-lg shadow p-4 flex flex-col justify-between">
                        <div>
                            <img src="${p.image}" alt="${p.name}" class="w-full h-32 object-cover rounded-lg mb-4">
                            <h3 class="font-bold text-gray-500">${p.name}</h3>
                            <p class="text-gray-800 font-bold mb-2">${formatRupiah(p.price)}</p>
                            <div class="flex justify-between">
                                <p class="text-sm font-semibold">stock</p>    
                                <p class="text-sm text-green-600 font-semibold bg-emerald-100 p-1 rounded-lg">${p.stock} Product</p>    
                            </div>
                        </div>
                        <button onclick="addToOrder(${p.id})" class="mt-4 w-full border border-emerald-500 text-emerald-600 py-2 rounded-lg font-semibold hover:bg-emerald-200 transition-colors">
                           <i class="fas fa-plus mr-2 bg-emerald-500 rounded-full p-1 rounded-full text-white"></i> Add
                        </button>
                    </div>
                `;
            });
        }

        function updateQuantity(id, change) {
            let item = order.find(i => i.id === id);
            if (item) {
                item.quantity += change;
                if (item.quantity <= 0) order = order.filter(i => i.id !== id);
            }
            renderOrder();
        }

        function addToOrder(id) {
            let item = order.find(i => i.id === id);
            if (item) item.quantity++;
            else order.push({
                ...products.find(p => p.id === id),
                quantity: 1
            });
            renderOrder();
        }

        function renderOrder() {
            const container = document.getElementById('order-items');
            container.innerHTML = '';
            let subtotal = 0;
            order.forEach(item => {
                subtotal += item.price * item.quantity;
                container.innerHTML += `
                    <div class="flex flex-col">
                        <div class="flex justify-between">
                            <p class="font-semibold text-gray-800 text-sm">${item.name}</p>
                            <p class="font-bold text-gray-800 text-sm mb-2">${formatRupiah(item.price * item.quantity)}</p>
                        </div>
                       <div class="relative">
                            <input type="text" placeholder="Catatan..."
                                class="pr-10 pr-4 py-2 bg-slate-100 border-white bg-white focus:border-white focus:ring-white rounded-lg w-full">
                            <i class="fas fa-pencil absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                        <div class="flex justify-between mt-2">
                            <button onclick="updateQuantity(${item.id}, -1)" class="w-8 h-8 text-white p-2 rounded-full text-sm font-bold flex items-center justify-center">
                                <i class="fa fa-trash text-red-500"></i>
                            </button>
                            <div class="flex items-center border rounded-full p-1">
                                <button onclick="updateQuantity(${item.id}, -1)" class="w-8 h-8 bg-emerald-500 text-white rounded-full text-sm font-bold flex items-center justify-center">-</button>
                                <span class="mx-2 font-semibold text-sm">${item.quantity}</span>
                                <button onclick="updateQuantity(${item.id}, 1)" class="w-8 h-8 bg-emerald-500 text-white rounded-full text-sm font-bold flex items-center justify-center">+</button>
                            </div>
                        </div>
                    </div>
                `;
            });

            const service = subtotal * 0.05;
            const tax = subtotal * 0.10;
            const total = subtotal + service + tax;

            document.getElementById('subtotal').innerText = formatRupiah(subtotal);
            document.getElementById('service-charge').innerText = formatRupiah(service);
            document.getElementById('tax').innerText = formatRupiah(tax);
            document.getElementById('total-payment').innerText = formatRupiah(total);
        }

        document.addEventListener('DOMContentLoaded', () => {
            renderProducts();
            // Initial dummy order for preview
            addToOrder(1);
            addToOrder(2);
            addToOrder(5);
        });
    </script>
</x-app-layout>
