@extends('includes.page.content')

@section('page_content')

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-truck"></i> Productos</h3>
            </div>
            <div class="title_right">
                <a href="{{ route('products.create') }}" class="btn btn-default pull-right">
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
                <h2>Listado de productos</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <p>Listado de productos registrados en el sistema.</p>
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
                            <th class="text-center">IVA</th>
                            <th class="text-center">Costo Total</th>
                            <th class="text-center">Costo Unitario</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td class="text-right">{{ $product->id }}</td>
                                <td>
                                    {{ $product->name }}
                                    <br>
                                    <small>Creado {{ $product->present()->createdAt }}</small>
                                </td>
                                <td class="text-center">
                                    <img class="img-responsive center-block gs-image gs-image-thumbnail" src="{{ $product->imagePath() }}">
                                </td>
                                <td class="text-center">{{ $product->productType->name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('supplier.show', [$product->supplier->id]) }}">{{ $product->supplier->name }}</a>
                                </td>
                                <td class="text-right">{{ $product->present()->quantity }}</td>
                                <td class="text-center">{{ $product->unity->name }}</td>
                                <td class="text-right">{{ $product->present()->price }}</td>
                                <td class="text-right">{{ $product->present()->iva }}</td>
                                <td class="text-right">{{ $product->present()->total }}</td>
                                <td class="text-right">{{ $product->present()->unitCost }}</td>
                                <td class="text-center">
                                    <a class="btn btn-info btn-xs" href="{{ route('products.edit', [$product->id]) }}"><i class="fa fa-edit"></i> Editar</a>
                                    <a class="btn btn-danger btn-xs" href="#" data-toggle="modal" data-target="#deleteModal" data-action="{{ route('products.destroy', [$product->id]) }}"> <i class="fa fa-trash"></i> Borrar</a>
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
        {{ $products->links() }}
    </div>
</div>

<!-- Modal -->
@include('includes.modals.delete', ['entityText' => 'producto'])

@endsection
