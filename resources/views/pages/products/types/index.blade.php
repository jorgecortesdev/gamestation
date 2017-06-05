@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            <i class="fa fa-fw fa-list-ul"></i> Tipo de Productos
        @endslot

        @slot('buttons')
            <a href="{{ route('product-types.create') }}" class="btn btn-primary">
                <i class="fa fa-fw fa-plus-square"></i> Agregar
            </a>
        @endslot

        <h4>Listado de tipos de productos</h4>
        <p>El siguiente catálogo es utilizado como máscara de los productos ante los paquetes y los extras, el producto activo es el que es utilizado para los cálculos de los precios.</p>

        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Producto activo</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-center">Configurable</th>
                        <th class="text-center">Personalizable</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($productTypes->count() > 0)
                        @foreach ($productTypes as $productType)
                        <tr>
                            <td class="text-right">{{ $productType->id }}</td>
                            <td>
                                {{ $productType->name }}
                                <br>
                                <small>Creado {{ $productType->present()->created_at }}</small>
                            </td>
                            <td class="text-center">
                                {!! $productType->present()->product !!}
                            </td>
                            <td class="text-center">{!! $productType->quantity !!}</td>
                            <td class="text-center">{!! $productType->present()->configurable !!}</td>
                            <td class="text-center">{!! $productType->present()->customizable !!}</td>
                            <td class="text-center">
                                <a class="btn btn-info" href="{{ route('product-types.edit', [$productType->id]) }}">
                                    <i class="fa fa-fw fa-edit"></i> Editar
                                </a>
                                <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#deleteModal" data-action="{{ route('product-types.destroy', [$productType->id]) }}">
                                    <i class="fa fa-fw fa-trash"></i> Borrar
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="7"><div class="alert text-center">Sin tipos de productos</div></td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="text-center">
            {{ $productTypes->links() }}
        </div>
    @endcomponent

@endsection

@push('modals')
@include('modals.delete', ['entityText' => 'tipo de producto'])
@endpush
