@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            <i class="fa fa-fw fa-user"></i> Clientes
        @endslot

        @slot('buttons')
            <a href="{{ route('clients.create') }}" class="btn btn-primary">
                <i class="fa fa-fw fa-plus-square"></i> Agregar
            </a>
        @endslot

        <h4>Listado de clientes</h4>
        <p>Clientes registrados en el sistema.</p>

        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Dirección</th>
                        <th class="text-center">Teléfono</th>
                        <th class="text-center">Correo</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($clients->count() > 0)
                        @foreach ($clients as $client)
                            <tr>
                                <td class="text-right">{{ $client->id }}</td>
                                <td>
                                    <a href="#">{{ $client->name }}</a>
                                    <br>
                                    <small>Creado {{ $client->present()->createdAt }}</small>
                                </td>
                                <td>{{ $client->address }}</td>
                                <td class="text-center no-wrap">
                                    <div>
                                        {{ $client->present()->telephone }}
                                    </div>
                                </td>
                                <td>{{ $client->present()->email }}</td>
                                <td class="text-center no-wrap actions">
                                    <div>
                                        <a class="btn btn-info" href="{{ route('clients.edit', [$client->id]) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                        <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#deleteModal" data-action="{{ route('clients.destroy', [$client->id]) }}"> <i class="fa fa-fw fa-trash"></i> Borrar</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="6"><div class="alert text-center">Sin clientes</div></td>
                    </tr>
                    @endif
                </tbody>
            </table>

            <div class="text-center">
                {{ $clients->links() }}
            </div>
        </div>

    @endcomponent

@endsection

@push('modals')
@include('modals.delete', ['entityText' => 'cliente'])
@endpush
