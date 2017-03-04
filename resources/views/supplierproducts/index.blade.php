@extends('layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Productos</h3>
                    </div>
                    <div class="title_right">
                        <a href="{{ route('supplier_product.create') }}" class="btn btn-default pull-right">
                            <i class="fa fa-plus-square"></i> Agregar
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Tipo</th>
                                    <th class="text-center">Proveedor</th>
                                    <th class="text-center">Cantidad</th>
                                    <th class="text-center">Unidad</th>
                                    <th class="text-center">Precio</th>
                                    <th class="text-center">IVA</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->type->name }}</td>
                                        <td>{{ $product->supplier->name }}</td>
                                        <td class="text-right">{{ $product->quantity }}</td>
                                        <td class="text-center">{{ $product->unity->name }}</td>
                                        <td class="text-right">{{ $product->present()->price }}</td>
                                        <td class="text-right">{{ $product->present()->iva }}</td>
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
    </div>
    <!-- /page content -->

    <!-- Modal -->
    @include('modals.delete', ['entityText' => 'proveedor'])

    <!-- footer content -->
    @include('includes.footer')
    <!-- /footer content -->
@endsection
