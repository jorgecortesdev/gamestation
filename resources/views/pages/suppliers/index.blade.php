@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            <i class="fa fa-fw fa-truck"></i> Proveedores
        @endslot

        @slot('buttons')
            <a href="{{ route('suppliers.create') }}" class="btn btn-primary">
                <i class="fa fa-fw fa-plus-square"></i> Agregar
            </a>
        @endslot

        <h4>Listado de proveedores</h4>
        <p>Proveedores registrados en el sistema.</p>

        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Imágen</th>
                        <th class="text-center">Dirección</th>
                        <th class="text-center">Teléfono</th>
                        <th class="text-center">Correo</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($suppliers->count() > 0)
                        @foreach ($suppliers as $supplier)
                        <tr>
                            <td class="text-right">{{ $supplier->id }}</td>
                            <td>
                                <a href="{{ $supplier->path() }}">
                                    {{ $supplier->name }}
                                    <br>
                                    <small>Creado {{ $supplier->present()->createdAt }}</small>
                                </a>
                            </td>
                            <td class="text-center gs-image">
                                <a href="{{ $supplier->path() }}">
                                    <img src="{{ $supplier->image }}">
                                </a>
                            </td>
                            <td>{{ $supplier->address }}</td>
                            <td class="text-center no-wrap">
                                <div>
                                    {{ $supplier->present()->telephone }}
                                </div>
                            </td>
                            <td class="text-center">{{ $supplier->present()->email }}</td>
                            <td class="text-center  no-wrap actions">
                                <div>
                                    <a class="btn btn-primary" href="{{ $supplier->path() }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                    <a class="btn btn-info" href="{{ route('suppliers.edit', [$supplier->id]) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                    <a class="btn btn-danger"
                                        href="#"
                                        data-toggle="modal"
                                        data-target="#deleteModal"
                                        data-action="{{ route('suppliers.destroy', [$supplier->id]) }}"><i class="fa fa-fw fa-trash"></i> Borrar</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="7"><div class="alert text-center">Sin proveedores</div></td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="text-center">
            {{ $suppliers->links() }}
        </div>

    @endcomponent

@endsection

@push('modals')
@include('modals.delete', ['entityText' => 'proveedor'])
@endpush
