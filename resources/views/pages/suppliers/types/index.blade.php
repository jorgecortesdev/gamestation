@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            <i class="fa fa-fw fa-list-ul"></i> Tipo de Provedores
        @endslot

        @slot('buttons')
            <a href="{{ route('supplier-types.create') }}" class="btn btn-default">
                <i class="fa fa-fw fa-plus-square"></i> Agregar
            </a>
        @endslot

        <h4>Catálogo de tipos de proveedores</h4>
        <p>Catálogo de tipos de proveedores registrados en el sistema.</p>

        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($supplierTypes as $supplierType)
                        <tr>
                            <td class="text-right">{{ $supplierType->id }}</td>
                            <td>
                                {{ $supplierType->name }}
                                <br>
                                <small>Creado {{ $supplierType->created_at->format('d.m.Y') }}</small>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-info" href="{{ route('supplier-types.edit', [$supplierType->id]) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#deleteModal" data-action="{{ route('supplier-types.destroy', [$supplierType->id]) }}">
                                    <i class="fa fa-fw fa-trash"></i> Borrar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-center">
                {{ $supplierTypes->links() }}
            </div>
        </div>
    @endcomponent

@endsection

@push('modals')
@include('modals.delete', ['entityText' => 'unidad'])
@endpush

