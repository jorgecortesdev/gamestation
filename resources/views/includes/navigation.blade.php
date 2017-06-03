<ul class="nav navbar-nav">

    <li class="{{ Helper::setActive('home') }}">
        <a href="{{ route('home') }}"><i class="fa fa-fw fa-home"></i> Inicio</a>
    </li>

    <li class="{{ Helper::setActive('schedule') }}">
        <a href="{{ route('schedule.index') }}"><i class="fa fa-fw fa-calendar"></i> Agenda</a>
    </li>

    <li class="{{ Helper::setActive('events') }}">
        <a href="{{ route('events.index') }}"><i class="fa fa-fw fa-calendar-o"></i> Eventos</a>
    </li>

    <li class="{{ Helper::setActive('clients') }}">
        <a href="{{ route('clients.index') }}"><i class="fa fa-fw fa-user"></i> Clientes</a>
    </li>

    <li class="{{ Helper::setActive('kids') }}">
        <a href="{{ route('kids.index') }}"><i class="fa fa-fw fa-child"></i> Niños</a>
    </li>

</ul>