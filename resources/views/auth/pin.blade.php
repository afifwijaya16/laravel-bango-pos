<x-guest-layout>
    <div class="text-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Food Truck Jajanan Bango</h1>
        <p class="text-lg text-gray-600 mt-2">Welcome, <span class="font-semibold">{{ session('email') }}</span></p>
    </div>

    <form method="POST" action="{{ route('verify-pin') }}" id="pinForm">
        @csrf

        <div class="mb-8 text-center">
            <p class="text-gray-700 mb-4" id="pinPrompt">Enter your 4 digits PIN</p>
            <div class="flex justify-center space-x-4 mb-2">
                <div class="w-12 h-12 border-2 rounded-full flex items-center justify-center pin-digit 
                @error('pin') border-red-500 @else border-gray-300 @enderror"
                    data-index="0"></div>
                <div class="w-12 h-12 border-2 rounded-full flex items-center justify-center pin-digit 
                @error('pin') border-red-500 @else border-gray-300 @enderror"
                    data-index="1"></div>
                <div class="w-12 h-12 border-2 rounded-full flex items-center justify-center pin-digit 
                @error('pin') border-red-500 @else border-gray-300 @enderror"
                    data-index="2"></div>
                <div class="w-12 h-12 border-2 rounded-full flex items-center justify-center pin-digit 
                @error('pin') border-red-500 @else border-gray-300 @enderror"
                    data-index="3"></div>
            </div>
            <input type="hidden" name="pin" id="pinInput">
            @error('pin')
                <span class="text-red-500 text-sm" id="pinError">{{ $message }}</span>
            @enderror
        </div>
        <div class="grid grid-cols-3 gap-4">
            <button type="button"
                class="pin-btn bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-4 rounded-lg transition"
                data-value="1">1</button>
            <button type="button"
                class="pin-btn bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-4 rounded-lg transition"
                data-value="2">2</button>
            <button type="button"
                class="pin-btn bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-4 rounded-lg transition"
                data-value="3">3</button>
            <button type="button"
                class="pin-btn bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-4 rounded-lg transition"
                data-value="4">4</button>
            <button type="button"
                class="pin-btn bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-4 rounded-lg transition"
                data-value="5">5</button>
            <button type="button"
                class="pin-btn bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-4 rounded-lg transition"
                data-value="6">6</button>
            <button type="button"
                class="pin-btn bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-4 rounded-lg transition"
                data-value="7">7</button>
            <button type="button"
                class="pin-btn bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-4 rounded-lg transition"
                data-value="8">8</button>
            <button type="button"
                class="pin-btn bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-4 rounded-lg transition"
                data-value="9">9</button>
            <button type="button"
                class="pin-btn bg-red-200 hover:bg-red-300 text-red-800 font-bold py-4 rounded-lg transition"
                data-value="C">C</button>
            <button type="button"
                class="pin-btn bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-4 rounded-lg transition"
                data-value="0">0</button>
            <button type="button"
                class="pin-btn bg-red-200 hover:bg-red-300 text-red-800 font-bold py-4 rounded-lg transition"
                data-value="X">X</button>
        </div>
    </form>

    <div class="mt-8 text-center text-sm text-gray-500">
        POS System V1.0
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const pinDigits = Array.from(document.querySelectorAll('.pin-digit'));
            const pinButtons = document.querySelectorAll('.pin-btn');
            const pinInput = document.getElementById('pinInput');
            const pinForm = document.getElementById('pinForm');
            const pinPrompt = document.getElementById('pinPrompt');
            const pinError = document.getElementById('pinError');
            let currentPin = [];
            const maxPinLength = 4;

            pinButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const value = this.getAttribute('data-value');
                    if (pinError) {
                        pinError.classList.add('hidden');
                    }
                    if (value === 'C') {
                        currentPin = [];
                        updatePinDisplay();
                    } else if (value === 'X') {
                        if (currentPin.length > 0) {
                            currentPin.pop();
                            updatePinDisplay();
                        }
                    } else if (currentPin.length < maxPinLength) {
                        currentPin.push(value);
                        updatePinDisplay();
                    }
                });
            });

            function updatePinDisplay() {
                pinDigits.forEach((digit, index) => {
                    digit.classList.remove('border-gray-300', 'border-red-500', 'border-blue-500');

                    if (index < currentPin.length) {
                        digit.textContent = '•';
                        digit.classList.add('border-blue-500');
                    } else {
                        digit.textContent = '';
                        if (pinError && !pinError.classList.contains('hidden') && currentPin.length === 0) {
                            digit.classList.add('border-red-500');
                        } else {
                            digit.classList.add('border-gray-300');
                        }
                    }
                });
                pinPrompt.classList.toggle('hidden', currentPin.length > 0);
                pinInput.value = currentPin.join('');

                // auto submit
                if (currentPin.length === maxPinLength) {
                    setTimeout(() => {
                        pinForm.submit();
                    }, 200);
                }
            }
        });
    </script>
</x-guest-layout>
