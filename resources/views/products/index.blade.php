@extends('includes.page.content')

@section('page_content')

@include('includes.page.header', [
     'title_decoration' => '<i class="fa fa-truck"></i> ',
     'title'            => 'Productos',
     'search_route'     => 'products.index'
])

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            @include('includes.components.panel.header', [
                'title' => 'Listado de productos',
                'buttons' => [
                    'add'  => 'products.create',
                    'back' => Request::input('query') ? 'products.index' : false,
                ]
            ])

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
                            <th class="text-center">Costo Unitario</th>
                            <th class="text-center">IVA</th>
                            <th class="text-center">Costo Total</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
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
                                <td class="text-center">
                                    <img class="img-responsive center-block gs-image gs-image-thumbnail" src="{{ $product->imagePath() }}">
                                </td>
                                <td class="text-center">{{ $product->productType->name }}</td>
                                <td class="text-center">
                                    <a href="{{ $product->supplier->path() }}">{{ $product->supplier->name }}</a>
                                </td>
                                <td class="text-right">{{ $product->present()->quantity }}</td>
                                <td class="text-center">{{ $product->unity->name }}</td>
                                <td class="text-right">{{ $product->present()->price }}</td>
                                <td class="text-right">{{ $product->present()->iva }}</td>
                                <td class="text-right">{{ $product->present()->total }}</td>
                                <td class="text-center">
                                    @include('includes.components.table.actions', [
                                        'entity' => $product,
                                        'route_show'    => 'products.show',
                                        'route_edit'    => 'products.edit',
                                        'route_destroy' => 'products.destroy',
                                    ])
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
