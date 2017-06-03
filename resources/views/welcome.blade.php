<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/public.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="position-ref">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Entrar</a>
                    @endif
                </div>
            @endif
        </div>

        <div class="container">
            <div class="logo">
                <img src="{{ asset('images/logo.jpeg') }}" alt="GameStation Mx">
            </div>
        </div>

        <footer class="footer">
            <address>
                Blvd. Luis Donaldo Colosio #870, Plaza Nova Local 8, <br>
                Col. Villas del Mediterraneo, Hermosillo, Sonora, México.
            </address>
        </footer>
    </body>
</html>
