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
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                    <th>Proveedor</th>
                                    <th>Cantidad</th>
                                    <th>Unidad</th>
                                    <th>Costo</th>
                                    <th>IVA</th>
                                    <th>Costo Total</th>
                                    <th>Costo Unitario</th>
                                    <th>&nbsp;</th>
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
                                        <td>{{ $product->unity->name }}</td>
                                        <td class="text-right">{{ $product->present()->price }}</td>
                                        <td class="text-right">{{ $product->present()->iva }}</td>
                                        <td class="text-right">{{ $product->present()->total }}</td>
                                        <td class="text-right">{{ $product->present()->unitCost }}</td>
                                        <td class="text-right">
                                            <a href="{{ route('supplier_product.edit', [$product->id]) }}"><i class="fa fa-edit"></i> Editar</a>
                                            &nbsp;|&nbsp;
                                            <a href="#" data-toggle="modal" data-target="#deleteModal" data-action="{{ route('supplier_product.destroy', [$product->id]) }}"> <i class="fa fa-trash"></i> Borrar</a>
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
    </div>
    <!-- /page content -->

    <!-- Modal -->
    @include('modals.delete', ['entityText' => 'producto'])

    <!-- footer content -->
    @include('includes.footer')
    <!-- /footer content -->
@endsection
