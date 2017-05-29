<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

    <head>
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Game Station Mx</title>

        <!-- Bootstrap -->
        <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet">
        <!-- PNotify -->
        <link href="{{ asset("css/pnotify.css") }}" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="{{ asset("css/gentelella.min.css") }}" rel="stylesheet">
        <!-- Game Station Mx Style -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        @stack('stylesheets')

    </head>

    <body class="nav-sm">
        <div id="main" class="container body">
            <div class="main_container">

                @include('includes.layouts.sidebar')

                @include('includes.layouts.topbar')

                @yield('main_container')
            </div>

            <flash message="{{ session('flash_notification.message') }}"></flash>
        </div>
        <!-- jQuery -->
        <script src="{{ asset("js/jquery.min.js") }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset("js/bootstrap.min.js") }}"></script>
        <!-- Moment -->
        <script src="{{ asset("js/moment.js") }}"></script>
        <!-- Custom Theme Scripts -->
        <script src="{{ mix('js/app.js') }}"></script>
        <!-- Gentelella -->
        <script src="{{ asset("js/gentelella.js") }}"></script>

        @stack('scripts')

        @stack('handlebars')
    </body>
</html>