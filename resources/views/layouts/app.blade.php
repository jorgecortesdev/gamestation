<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @stack('stylesheets')

</head>
<body>
    <div id="app">
        @include('includes.header')

        <div class="container-fluid">
            @yield('content')
        </div>

        <flash
            message="{{ session('flash_notification.0.message') }}"
            level="{{ session('flash_notification.0.level') }}"
        ></flash>

    </div>

    @include('includes.footer')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    @stack('scripts')

    @stack('modals')

    @stack('handlebars')
</body>
</html>
