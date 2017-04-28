<!DOCTYPE html>
<html lang="en">
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GameStation Mx</title>

        <link href="{{ asset("css/public.css") }}" rel="stylesheet">

        @stack('stylesheets')

    </head>

    <body>

        <div class="content">

            @yield('main_container')

        </div>

        <footer>
            <address>
                Blvd. Luis Donaldo Colosio #870, Plaza Nova Local 8, <br>
                Col. Villas del Mediterraneo, Hermosillo, Sonora, México.
            </address>
        </footer>

        @stack('scripts')

    </body>
</html>