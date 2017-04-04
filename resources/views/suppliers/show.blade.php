@extends('layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Información de Proveedor</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-2 col-sm-2 col-xs-12 profile_left">
                                <div class="gs-profile-img">
                                    <img class="img-responsive" src="{{ asset('img/default.png') }}">
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <h3>{{ $supplier->name }}</h3>
                                <ul class="list-unstyled user_data">
                                    <li><i class="fa fa-map-marker fa-fw"></i> {{ $supplier->address }}</li>
                                    <li><i class="fa fa-phone fa-fw"></i> {{ $supplier->present()->telephone }}</li>
                                    <li><i class="fa fa-envelope fa-fw"></i> {{ $supplier->present()->email }}</li>
                                </ul>
                                <ul class="list-inline gs-list-product-types">
                                    @foreach ($supplier->productTypes as $type)
                                        <li><button class="btn btn-info btn-sm">{{ $type->name }}</button></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="gs-title bg-success">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h2>Lista de productos</h2>
                                    </div>
                                </div>
                                <br>
                                <table class="table table-hover table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Id</th>
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Tipo</th>
                                            <th class="text-center">Activo</th>
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
                                        @foreach ($supplier->products as $product)
                                            <tr>
                                                <td class="text-right">{{ $product->id }}</td>
                                                <td>
                                                    {{ $product->name }}
                                                    <br>
                                                    <small>Creado {{ $product->present()->createdAt }}</small>
                                                </td>
                                                <td class="text-center">{{ $product->productType->name }}</td>
                                                <td class="text-center">{!! $product->present()->isActive() !!}</td>
                                                <td class="text-center">{{ $product->present()->quantity }}</td>
                                                <td class="text-center">{{ $product->unity->name }}</td>
                                                <td class="text-right">{{ $product->present()->price }}</td>
                                                <td class="text-right">{{ $product->present()->iva }}</td>
                                                <td class="text-right">{{ $product->present()->total }}</td>
                                                <td class="text-right">{{ $product->present()->unitCost }}</td>
                                                <td class="text-center">
                                                    <a class="btn btn-info btn-xs" href="{{ route('supplier_product.edit', [$product->id]) }}"><i class="fa fa-edit"></i> Editar</a>
                                                    <a class="btn btn-danger btn-xs" href="#" data-toggle="modal" data-target="#deleteModal" data-action="{{ route('supplier_product.destroy', [$product->id]) }}"> <i class="fa fa-trash"></i> Borrar</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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