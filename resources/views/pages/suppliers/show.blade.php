@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            <i class="fa fa-fw fa-truck"></i> Información de Proveedor
        @endslot

        @slot('buttons')
            <a href="{{ route('suppliers.edit', [$supplier->id]) }}" class="btn btn-primary">
                <i class="fa fa-fw fa-edit"></i> Editar
            </a>
            <a href="{{ route('suppliers.index') }}" class="btn btn-primary">
                <i class="fa fa-fw fa-arrow-left"></i> Volver
            </a>
        @endslot

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $supplier->name }}</h3>
            </div>

            <div class="panel-body">

                @component('components.media')
                    @slot('left')
                        <img src="{{ $supplier->image }}">
                    @endslot

                    <ul class="list-unstyled">
                        <li><i class="fa fa-fw fa-map-marker"></i> {{ $supplier->address }}</li>
                        <li><i class="fa fa-fw fa-phone"></i> {{ $supplier->present()->telephone }}</li>
                        <li><i class="fa fa-fw fa-envelope"></i> {{ $supplier->present()->email }}</li>
                    </ul>

                    <ul class="list-inline">
                        @foreach ($activeProductTypes as $type)
                        <li><button class="btn btn-info btn-sm">{{ $type->name }}</button></li>
                        @endforeach
                    </ul>

                @endcomponent

            </div>

        </div>

        <div class="aligner">
            <h3 class="aligner-item">Lista de productos</h3>

            <div class="btn-group">
                <a class="btn btn-default" href="{{ route('suppliers.products.create', $supplier->id) }}">
                    <i class="fa fa-fw fa-plus" aria-hidden="true"></i> Agregar Producto
                </a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Imágen</th>
                        <th class="text-center">Tipo</th>
                        <th class="text-center">Activo</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-center">Unidad</th>
                        <th class="text-center">IVA</th>
                        <th class="text-center">Precio</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                    <tr>
                        <td class="text-right">{{ $product->id }}</td>
                        <td>
                            <a href="{{ $product->path() }}">
                                {{ $product->name }}<br><small>Creado {{ $product->present()->createdAt }}</small>
                            </a>
                        </td>
                        <td class="text-center gs-image">
                            <a href="{{ $product->path() }}">
                                <img class="img-responsive center-block gs-image gs-image-thumbnail" src="{{ $product->image }}">
                            </a>
                        </td>
                        <td class="text-center">{{ $product->productType->name }}</td>
                        <td class="text-center">{!! $product->present()->isActive() !!}</td>
                        <td class="text-center">{{ $product->present()->quantity }}</td>
                        <td class="text-center">{{ $product->unity->name }}</td>
                        <td class="text-right">{{ $product->present()->iva }}</td>
                        <td class="text-right">{{ $product->present()->price }}</td>
                        <td class="text-center no-wrap actions">
                            <div>
                                <a class="btn btn-primary" href="{{ $product->path() }}">
                                    <i class="fa fa-fw fa-eye"></i> Ver
                                </a>
                                <a class="btn btn-info" href="{{ route('suppliers.products.edit', [$supplier->id, $product->id]) }}">
                                    <i class="fa fa-fw fa-edit"></i> Editar
                                </a>
                                <a class="btn btn-danger"
                                    href="#"
                                    data-toggle="modal"
                                    data-target="#deleteModal"
                                    data-action="{{ route('suppliers.products.destroy', [$supplier->id, $product->id]) }}"><i class="fa fa-fw fa-trash"></i> Borrar </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="12" class="text-center">
                            <br>
                            <div class="alert alert-default">Sin productos</div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    @endcomponent

@endsection

@push('modals')
@include('modals.delete', ['entityText' => 'producto'])
@endpush
