<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

        <!-- Style -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased">
        <main>
            <section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
                <div class="container">
                    @yield('content')
                </div>
            </div>
        </main>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>