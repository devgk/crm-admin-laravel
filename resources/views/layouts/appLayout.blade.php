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
        @yield('content')

        @include('components/preloader')

        {{-- sweetalert --}}
        @include('sweetalert::alert')

        <script>
            var current_url = @php echo '"'.Request::route()->uri().'"'; @endphp;
            var csrf_token = "{{ csrf_token() }}";
        </script>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/datatables.min.js') }}" defer></script>
        <script src="{{ asset('js/dataTables.buttons.min.js') }}" defer></script>
        <script src="{{ asset('js/jszip.min.js') }}" defer></script>
        <script src="{{ asset('js/buttons.html5.min.js') }}" defer></script>
    </body>
</html>