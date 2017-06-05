@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            <i class="fa fa-fw fa-truck"></i> Productos
        @endslot

        @slot('buttons')
            <a href="{{ route('products.create') }}" class="btn btn-primary">
                <i class="fa fa-fw fa-plus-square"></i> Agregar
            </a>
        @endslot

        <h4>Listado de productos</h4>
        <p>Listado de productos registrados en el sistema.</p>

        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Imágen</th>
                        <th class="text-center">Tipo</th>
                        <th class="text-center">Proveedor</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-center">Unidad</th>
                        <th class="text-center">Costo</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($products->count() > 0)
                        @foreach ($products as $product)
                        <tr>
                            <td class="text-right">{{ $product->id }}</td>
                            <td>
                                <a href="{{ $product->path() }}">
                                    {{ $product->name }}
                                    <br>
                                    <small>Creado {{ $product->present()->createdAt }}</small>
                                </a>
                            </td>
                            <td class="text-center gs-image">
                                <img src="{{ $product->imagePath() }}">
                            </td>
                            <td class="text-center">{{ $product->productType->name }}</td>
                            <td class="text-center">
                                <a href="{{ $product->supplier->path() }}">{{ $product->supplier->name }}</a>
                            </td>
                            <td class="text-right">{{ $product->present()->quantity }}</td>
                            <td class="text-center">{{ $product->unity->name }}</td>
                            <td class="text-right">{{ $product->present()->total }}</td>
                            <td class="text-center no-wrap actions">
                                <div>
                                    <a class="btn btn-primary" href="{{ route('products.show', [$product->id]) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                    <a class="btn btn-info" href="{{ route('products.edit', [$product->id]) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                    <a class="btn btn-danger"
                                        href="#"
                                        data-toggle="modal"
                                        data-target="#deleteModal"
                                        data-action="{{ route('products.destroy', [$product->id]) }}"><i class="fa fa-fw fa-trash"></i> Borrar</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="9"><div class="alert text-center">Sin productos</div></td>
                    </tr>
                    @endif
                </tbody>
            </table>

            <div class="text-center">
                {{ $products->links() }}
            </div>
        </div>

    @endcomponent

@endsection

@push('modals')
@include('modals.delete', ['entityText' => 'producto'])
@endpush
