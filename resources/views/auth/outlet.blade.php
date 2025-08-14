<x-guest-layout>
    <style>
        /* Ensure Select2 container inherits Tailwind look */
        .select2-container--default .select2-selection--single {
            @apply p-2 border border-gray-300 rounded-md shadow-sm w-full focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50;
            height: auto;
            /* Prevent fixed height */
        }

        /* Placeholder & text */
        .select2-container--default .select2-selection__rendered {
            @apply text-gray-700;
            line-height: 1.5rem;
        }

        /* Dropdown arrow */
        .select2-container--default .select2-selection__arrow {
            height: 100%;
        }

        /* Dropdown menu */
        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            @apply bg-orange-500 text-white;
        }

        /* Search box inside dropdown */
        .select2-container--default .select2-search--dropdown .select2-search__field {
            @apply border border-gray-300 rounded-md p-2 focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50;
        }
    </style>
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h2 class="text-center text-xl font-bold mb-3">Welcome, <span class="font-semibold">{{ session('username') }}
        </h2>
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('store-outlet') }}">
            @csrf
            <div>
                <x-input-label for="username" :value="__('Outlet')" />
                <select required
                    class="select2 p-2 border-gray-300 rounded-md shadow-sm block w-full focus:border-orange-500 focus:ring-orange-500"
                    name="outlet_id">
                    <option value="" selected disabled>--- Choise ---</option>
                    @foreach ($outlet as $key)
                        <option value="{{ $key->id }}">{{ $key->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('outlet_id')" class="mt-2" />
            </div>
            <div class="flex items-center mt-4">
                <button
                    class="w-full bg-orange-600 text-white py-2 px-4 rounded-md hover:bg-orange-700 transition duration-200 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">
                    {{ __('Select') }}
                </button>
            </div>
        </form>
    </div>
    <p class="text-center text-gray-400 text-xs mt-6">POS System V1.0</p>
    @push('js')
        <script>
            $(document).ready(function() {
                $('.select2').select2();
            });
        </script>
    @endpush
</x-guest-layout>
