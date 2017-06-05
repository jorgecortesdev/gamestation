@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            <i class="fa fa-calendar-o"></i> Eventos
        @endslot

        @slot('buttons')
            <a href="{{ route('events.create') }}" class="btn btn-primary">
                <i class="fa fa-fw fa-plus-square"></i> Agregar
            </a>
        @endslot

        <h4>Listado de eventos</h4>
        <p>Listado de eventos registrados en el sistema.</p>

        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Paquete</th>
                        <th class="text-center">Fecha</th>
                        <th class="text-center">Hora</th>
                        <th class="text-center">Cliente</th>
                        <th class="text-center">Niño</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($events->count() > 0)
                        @foreach ($events as $event)
                        <tr>
                            <td class="text-right">{{ $event->id }}</td>
                            <td>
                                <a href="{{ route('events.show', [$event->id]) }}">
                                    <div class="combo-decorator">
                                        {!! $event->combo->present()->renderColor('combo-color-xs') !!}
                                        <span>{{ $event->combo->name }}</span>
                                    </div>
                                </a>
                            </td>
                            <td class="text-center">{{ $event->present()->dateWhenOccurs }}</td>
                            <td class="text-center no-wrap">
                                <div>{{ $event->present()->timeWhenOccurs }}</div>
                            </td>
                            <td class="text-center">{{ $event->client->name }}</td>
                            <td class="text-center">{{ $event->kid->name }}</td>
                            <td class="text-center no-wrap actions">
                                <div>
                                    <a class="btn btn-primary" href="{{ route('events.show', [$event->id]) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                    <a class="btn btn-info" href="{{ route('events.edit', [$event->id]) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                    <a class="btn btn-danger"
                                        href="#"
                                        data-toggle="modal"
                                        data-target="#deleteModal"
                                        data-action="{{ route('events.destroy', [$event->id]) }}"><i class="fa fa-fw fa-trash"></i> Borrar</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="7"><div class="alert text-center">Sin eventos</div></td>
                    </tr>
                    @endif
                </tbody>
            </table>

            <div class="text-center">
                {{ $events->links() }}
            </div>

        </div>

    @endcomponent

@endsection

@push('modals')
@include('modals.delete', ['entityText' => 'evento'])
@endpush
