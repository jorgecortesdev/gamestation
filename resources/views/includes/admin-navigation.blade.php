<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
        {{ Auth::user()->name }} <span class="caret"></span>
    </a>

    <ul class="dropdown-menu" role="menu">
        <li><a href="{{ route('users.index') }}"><i class="fa fa-fw fa-users"></i> Usuarios</a></li>
        <li><a href="{{ route('combos.index') }}"><i class="fa fa-fw fa-gift"></i> Combos</a></li>
        <li><a href="{{ route('extras.index') }}"><i class="fa fa-fw fa-cube"></i> Extras</a></li>
        <li><a href="{{ route('suppliers.index') }}"><i class="fa fa-fw fa-truck"></i> Proveedores</a></li>
        <li role="separator" class="divider"></li>
        <li class="dropdown-header"><i class="fa fa-fw fa-list-ul"></i> Catálogos</li>
        <li><a href="{{ route('product-types.index') }}">Tipos de Productos</a></li>
        <li><a href="{{ route('properties.index') }}">Propiedades</a></li>
        <li><a href="{{ route('unities.index') }}">Unidades</a></li>
        <li role="separator" class="divider"></li>
        <li>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                <i class="fa fa-fw fa-sign-out"></i> Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
</li>