@extends('includes.page.content')

@section('page_content')

@include('includes.page.header', [
     'title_decoration' => '<i class="fa fa-calendar-o"></i> ',
     'title'            => 'Eventos',
     'search_route'     => 'events.index'
])

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            @include('includes.components.panel.header', [
                'title' => 'Listado de eventos',
                'buttons' => [
                    'add'  => 'events.create',
                    'back' => Request::input('query') ? 'events.index' : false,
                ]
            ])

            <div class="x_content">
                <p>Listado de eventos registrados en el sistema.</p>
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Paquete</th>
                            <th class="text-center">Color</th>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">Hora</th>
                            <th class="text-center">Cliente</th>
                            <th class="text-center">Niño</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                            <tr>
                                <td class="text-right">{{ $event->id }}</td>
                                <td>
                                    <a href="{{ route('events.show', [$event->id]) }}">
                                        {{ $event->combo->name }}
                                        <br>
                                        <small>Creado {{ $event->present()->createdAt }}</small>
                                    </a>
                                </td>
                                <td>
                                    <div class="combo-color combo-color-bg-{{ $event->combo->google_color_id }} center-block"></div>
                                </td>
                                <td class="text-center">{{ $event->present()->dateWhenOccurs }}</td>
                                <td class="text-center">{{ $event->present()->timeWhenOccurs }}</td>
                                <td class="text-center">{{ $event->client->name }}</td>
                                <td class="text-center">{{ $event->kid->name }}</td>
                                <td class="text-center">
                                    @include('includes.components.table.actions', [
                                        'entity'        => $event,
                                        'route_show'    => 'events.show',
                                        'route_edit'    => 'events.edit',
                                        'route_destroy' => 'events.destroy',
                                    ])
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
        {{ $events->links() }}
    </div>
</div>

<!-- Modal -->
@include('includes.modals.delete', ['entityText' => 'evento'])

@endsection
