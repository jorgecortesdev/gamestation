<div class="x_title">

    <h2>{!! isset($title_decoration) ? $title_decoration : '' !!}{{ isset($title) ? $title : 'NO TITLE' }}</h2>

    <div class="nav navbar-right btn-group">
        @if (! empty($buttons['back']))
        <a href="{{ route($buttons['back']) }}" class="btn btn-sm btn-primary">
            <i class="fa fa-fw fa-arrow-left" aria-hidden="true"></i> Volver
        </a>
        @endif

        @if (isset($buttons['add']))
        <a href="{{ route($buttons['add']) }}" class="btn btn-sm btn-primary">
            <i class="fa fa-fw fa-plus-square-o" aria-hidden="true"></i> Agregar
        </a>
        @endif

        @if (isset($buttons['edit']))
        <a href="{{ route($buttons['edit'], [$entity->id]) }}" class="btn btn-sm btn-primary">
            <i class="fa fa-fw fa-edit"></i> Editar
        </a>
        @endif

    </div>

    <div class="clearfix"></div>

</div>