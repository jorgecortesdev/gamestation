<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fa fa-birthday-cake"></i> GameStation <small><sup>MX</sup></small>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            @if ($signedIn)
            <!-- Left Side Of Navbar -->
            @include('includes.navigation')

            @endif

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                @else
                    @include('includes.admin-navigation')
                @endif
            </ul>
        </div>
    </div>

    <div class="gamestation-header-line">
        <div class="gamestation-header-line green"></div>
        <div class="gamestation-header-line blue"></div>
        <div class="gamestation-header-line red"></div>
        <div class="gamestation-header-line yellow"></div>
    </div>

</nav>
