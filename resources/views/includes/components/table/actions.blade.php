@unless($entity)
    <div class="alert alert-danger">NO ENTITY SET</div>
@else
    @if (isset($route_show))
    <a class="btn btn-primary btn-xs" href="{{ route($route_show, [$entity->id]) }}"><i class="fa fa-eye"></i> Ver</a>
    @endif

    @if (isset($route_edit))
    <a class="btn btn-info btn-xs" href="{{ route($route_edit, [$entity->id]) }}"><i class="fa fa-edit"></i> Editar</a>
    @endif

    @if (isset($route_destroy))
    <a class="btn btn-danger btn-xs"
        href="#"
        data-toggle="modal"
        data-target="#deleteModal"
        data-action="{{ route($route_destroy, [$entity->id]) }}"><i class="fa fa-trash"></i> Borrar</a>
    @endif
@endunless