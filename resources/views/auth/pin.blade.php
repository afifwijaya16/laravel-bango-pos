<x-guest-layout>
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h2 class="text-center text-xl font-bold mb-3">Welcome, <span class="font-semibold">{{ session('username') }}
        </h2>
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('verify-pin') }}" id="pinForm">
            @csrf
            <div class="mb-8 text-center">
                <p class="text-gray-700 font-semibold mb-4" id="pinPrompt">Enter your 4 digits PIN</p>
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
                <div class="flex justify-center">
                    <button type="button"
                        class="pin-btn w-20 aspect-square rounded-full font-bold transition bg-gray-200 text-gray-800 hover:bg-gray-300"
                        data-value="1">1</button>
                </div>
                <div class="flex justify-center">
                    <button type="button"
                        class="pin-btn w-20 aspect-square rounded-full font-bold transition bg-gray-200 text-gray-800 hover:bg-gray-300"
                        data-value="2">2</button>
                </div>
                <div class="flex justify-center">
                    <button type="button"
                        class="pin-btn w-20 aspect-square rounded-full font-bold transition bg-gray-200 text-gray-800 hover:bg-gray-300"
                        data-value="3">3</button>
                </div>
                <div class="flex justify-center">
                    <button type="button"
                        class="pin-btn w-20 aspect-square rounded-full font-bold transition bg-gray-200 text-gray-800 hover:bg-gray-300"
                        data-value="4">4</button>
                </div>
                <div class="flex justify-center">
                    <button type="button"
                        class="pin-btn w-20 aspect-square rounded-full font-bold transition bg-gray-200 text-gray-800 hover:bg-gray-300"
                        data-value="5">5</button>
                </div>
                <div class="flex justify-center">
                    <button type="button"
                        class="pin-btn w-20 aspect-square rounded-full font-bold transition bg-gray-200 text-gray-800 hover:bg-gray-300"
                        data-value="6">6</button>
                </div>
                <div class="flex justify-center">
                    <button type="button"
                        class="pin-btn w-20 aspect-square rounded-full font-bold transition bg-gray-200 text-gray-800 hover:bg-gray-300"
                        data-value="7">7</button>
                </div>
                <div class="flex justify-center">
                    <button type="button"
                        class="pin-btn w-20 aspect-square rounded-full font-bold transition bg-gray-200 text-gray-800 hover:bg-gray-300"
                        data-value="8">8</button>
                </div>
                <div class="flex justify-center">
                    <button type="button"
                        class="pin-btn w-20 aspect-square rounded-full font-bold transition bg-gray-200 text-gray-800 hover:bg-gray-300"
                        data-value="9">9</button>
                </div>
                <div class="flex justify-center"></div>
                <div class="flex justify-center">
                    <button type="button"
                        class="pin-btn w-20 aspect-square rounded-full font-bold transition bg-gray-200 text-gray-800 hover:bg-gray-300"
                        data-value="0">0</button>
                </div>
                <div class="flex justify-center">
                    <button type="button"
                        class="pin-btn w-20 aspect-square rounded-full font-bold transition bg-gray-200 text-gray-800 hover:bg-gray-300"
                        data-value="X"><i class="fa-solid fa-delete-left"></i></button>
                </div>
            </div>
        </form>
    </div>
    <p class="text-center text-gray-400 text-xs mt-6">POS System V1.0</p>


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
                    digit.classList.remove('border-gray-300', 'border-red-500', 'border-orange-500');

                    if (index < currentPin.length) {
                        digit.textContent = '•';
                        digit.classList.add('border-orange-500');
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
