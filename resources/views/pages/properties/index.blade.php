@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            <i class="fa fa-fw fa-list-ul"></i> Propiedades
        @endslot

        @slot('buttons')
            <a href="{{ route('properties.create') }}" class="btn btn-primary">
                <i class="fa fa-fw fa-plus-square"></i> Agregar
            </a>
        @endslot

        <h4>Listado de Propiedades</h4>
        <p>Catálogo de propiedades registradas en el sistema.</p>

        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Etiqueta</th>
                        <th class="text-center">Tipo de Render</th>
                        <th class="text-center">Opciones</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($properties->count() > 0)
                        @foreach ($properties as $property)
                        <tr>
                            <td class="text-right">{{ $property->id }}</td>
                            <td>
                                {{ $property->label }}
                                <br>
                                <small>Creado {{ $property->present()->createdAt }}</small>
                            </td>
                            <td class="text-center">{{ $property->renderType->name }}</td>
                            <td class="text-center">{{ $property->present()->options }}</td>
                            <td class="text-center">
                                <a class="btn btn-info" href="{{ route('properties.edit', [$property->id]) }}"><i class="fa fa-edit"></i> Editar</a>
                                <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#deleteModal" data-action="{{ route('properties.destroy', [$property->id]) }}">
                                    <i class="fa fa-trash"></i> Borrar
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="5"><div class="alert text-center">Sin propiedades</div></td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="text-center">
            {{ $properties->links() }}
        </div>

    @endcomponent

@endsection

@push('modals')
@include('modals.delete', ['entityText' => 'propiedad'])
@endpush
