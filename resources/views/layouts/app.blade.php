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
        <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: 'Roboto', sans-serif;
                color: #fff;
                background: #1a1a1a;
                min-height: 100vh;
                display: flex;
                flex-direction: column;
            }

            body::before {
                content: '';
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: -1;
                background: linear-gradient(-45deg, #1a1a1a, #003300, #006600, #009900);
                background-size: 400% 400%;
            }

            .navbar {
                background: rgba(0, 0, 0, 0.8);
                border-bottom: 2px solid #00ff00;
            }

            .navbar-brand, .nav-link {
                color: #00ff00 !important;
                font-family: 'Press Start 2P', cursive;
            }

            .navbar-brand:hover, .nav-link:hover {
                color: #00cc00 !important;
            }

            header.bg-white {
                background: rgba(0, 0, 0, 0.8) !important;
                border-bottom: 2px solid #00ff00;
            }

            header h1, header h2, header h3 {
                color: #00ff00;
                font-family: 'Press Start 2P', cursive;
            }

            /* Main Content */
            main {
                flex: 1;
                padding: 20px;
            }

            /* Buttons */
            .btn-primary {
                background: linear-gradient(45deg, #00ff00, #00cc00);
                border: none;
                font-family: 'Press Start 2P', cursive;
            }

            .btn-primary:hover {
                background: linear-gradient(45deg, #00cc00, #009900);
            }

            
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                @yield('content') 
            </main>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>