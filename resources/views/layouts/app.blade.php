<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.datatables.net/2.3.2/css/dataTables.tailwindcss.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        ::-webkit-scrollbar {
            height: 8px;
            width: 8px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            -webkit-border-radius: 8px;
            border-radius: 8px;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            -webkit-border-radius: 8px;
            border-radius: 8px;
            background: #a0aec0;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
        }

        ::-webkit-scrollbar-thumb:window-inactive {
            background: #a0aec0;
        }

        .dt-length select {
            color: black;
            background-color: #ffff;
            border-color: #4b5563;
            width: 80px;
        }

        .dt-paging a,
        .dt-search input {
            color: black;
            background-color: #ffff;
            border-color: #4b5563;
        }

        .dt-length label,
        .dt-search label {
            display: none;
        }

        .my-table {
            border-collapse: collapse;
            width: 100%;
        }

        .my-table th,
        .my-table td {
            border: 1px solid #ddd;
            background-color: white;
            color: black;
        }

        .dt-empty {
            text-align: center;
            margin: 20px 0;
            padding: 10px;
        }

        .main-content {
            display: flex;
            flex-direction: column;
            height: calc(100vh - 80px);
        }

        .grid-container {
            flex: 1;
            min-height: 0;
        }

        #order-container {
            height: calc(100vh - 110px);
            display: flex;
            flex-direction: column;
        }

        #order-items {
            flex: 1;
            overflow-y: auto;
        }
    </style>
</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="flex h-screen">
        @include('layouts.sidebar')
        <div class="flex-1 flex flex-col overflow-hidden">
            @include('layouts.navigation')
            {{ $slot }}
        </div>
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.tailwindcss.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @stack('js')
</body>

</html>
