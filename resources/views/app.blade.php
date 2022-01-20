<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="{{ asset('css/all.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="{{ asset('js/all.js') }}" defer></script>
    <script src="{{ asset('js/flowers/list.js') }}" defer></script>
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-white">
    <!-- Page Heading -->
    <header class="bg-white mx-20">
            @yield('bee-header')
    </header>

    <!-- Page Content -->
    <main class="bg-white mx-5 md:mx-20 lg:mx-20 xl:mx-20 sm:mx-20">
        @yield('bee-content')
    </main>

    <div id="info-modal" class="modal-container relative">
        <div class="modal-container__background bg-gray-800 opacity-50"></div>
        <div class="fixed">
            <div class="modal-container__box rounded-md fixed top-1/2 left-1/2 lg:w-1/3 md:w-2/4 sm:w-3/4 w-3/4 h-auto">
                <div class="modal-header rounded-t-md relative">
                    <img id="close-modal" src="{{ asset('images/icons/close-icon.svg') }}" class="absolute top-4 right-4 cursor-pointer" alt="close icon">
                </div>
                <div class="modal-body px-8 pb-8 pt-4">
                    <h4 class="modal-body__title-name"></h4>
                    <p class="modal-body__about-flower"></p>
                    <h4 class="modal-body__title-bees">Abelhas</h4>
                    <p class="modal-body__bee-names"></p>

                    <a href="#" class="block mt-5">Ver mais</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
