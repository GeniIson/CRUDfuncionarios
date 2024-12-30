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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>


    <style>
        .itens_nav {
            color: white;
        }

        .nav_pricipal {
            background-color: #0f86b7;
            color: white;
        }

        :hover.itens_nav {
            color: aquamarine
        }

        :hover.nav_pricipal {
            color: aquamarine
        }

        .div_inputs {
            width: 500px;
            margin: 40px;
        }

        .alert-success {

            background-color: aquamarine;
            text-align: center;
            height: 30px;

            margin-top: 10px;
        }

        .btn-custom1 {
            background-color: #4c5baf;



        }

        .btn-custom2 {
            background-color: #4CAF50;
            ;
        }

        .btn-custom3 {
            background-color: #af5b4c;
        }

        .btn-custom {
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            margin: 4px;
        }

        .btn-custom4 {

            background-color: #2e2f30dc;
            border-radius: 6px;
            height: 33px;
            padding: 4px;
            width: 85px;
            text-align: center;
        }

        .btn-custom:hover {

            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
            transform: scale(1.05);
        }


      
    </style>

</head>

<body class="font-sans antialiased">
     
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            </header>
        @endisset

        <!-- Page Content -->
        <main>


            {{ $slot }}
        </main>
    </div>
</body>

</html>
