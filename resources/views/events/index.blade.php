@extends('layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="page-title">
                    <div class="title_left">
                        <h3><i class="fa fa-calendar-o"></i> Eventos</h3>
                    </div>
                    <div class="title_right">
                        <a href="{{ route('events.create') }}" class="btn btn-default pull-right">
                            <i class="fa fa-plus-square"></i> Agregar
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Listado de eventos</h2>
                        <div class="clearfix"></div>
                    </div>
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
                                            {{ $event->combo->name }}
                                            <br>
                                            <small>Creado {{ $event->present()->createdAt }}</small>
                                        </td>
                                        <td>
                                            <div class="combo-color combo-color-bg-{{ $event->combo->google_color_id }} center-block"></div>
                                        </td>
                                        <td class="text-center">{{ $event->present()->dateWhenOccurs }}</td>
                                        <td class="text-center">{{ $event->present()->timeWhenOccurs }}</td>
                                        <td class="text-center">{{ $event->client->name }}</td>
                                        <td class="text-center">{{ $event->kid->name }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-info btn-xs" href="{{ route('events.edit', [$event->id]) }}"><i class="fa fa-edit"></i> Editar</a>
                                            <a class="btn btn-danger btn-xs" href="#" data-toggle="modal" data-target="#deleteModal" data-action="{{ route('events.destroy', [$event->id]) }}"> <i class="fa fa-trash"></i> Borrar</a>
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
    </div>
    <!-- /page content -->

    <!-- Modal -->
    @include('modals.delete', ['entityText' => 'evento'])

    <!-- footer content -->
    @include('includes.footer')
    <!-- /footer content -->
@endsection
