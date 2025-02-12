@props(['backRoute' => null])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Lopango') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen">

            @include('shared.navigation-admin')

            <!-- Page Heading -->
            @if (isset($header))
                <div class="container mt-11">
                    <div class="container-center">

                        @include('shared.section-title', [
                            'title' => $header
                        ])

                        @include('shared.back-route', [
                            'backRoute' => isset($backRoute) ? $backRoute : null
                        ])
                    </div>
                </div>

                <div class="container">
                    <div class="container-center">
                        @if (session('message'))
                            @include('shared.alert', [
                                'message' => session('message')
                            ])
                        @endif
                    </div>
                </div>

            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
