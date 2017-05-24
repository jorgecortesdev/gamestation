@extends('includes.page.content')

@section('page_content')

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-list-ul"></i> Tipo de Productos</h3>
            </div>
            <div class="title_right">
                <a href="{{ route('product_type.create') }}" class="btn btn-default pull-right">
                    <i class="fa fa-plus-square"></i> Agregar
                </a>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Listado de tipos de productos</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <p>El siguiente catálogo es utilizado como máscara de los productos ante los paquetes y los extras, el producto activo es el que es utilizado para los cálculos de los precios.</p>
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Producto activo</th>
                        <th class="text-center">Proveedor</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-center">Configurable</th>
                        <th class="text-center">Personalizable</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($product_types as $product_type)
                            <tr>
                                <td class="text-right">{{ $product_type->id }}</td>
                                <td>
                                    {{ $product_type->name }}
                                    <br>
                                    <small>Creado {{ $product_type->present()->created_at }}</small>
                                </td>
                                <td class="text-center">{!! $product_type->present()->product !!}</td>
                                <td class="text-center">{!! $product_type->present()->supplier !!}</td>
                                <td class="text-center">{!! $product_type->quantity !!}</td>
                                <td class="text-center">{!! $product_type->present()->configurable !!}</td>
                                <td class="text-center">{!! $product_type->present()->customizable !!}</td>
                                <td class="text-center">
                                    <a class="btn btn-info btn-xs" href="{{ route('product_type.edit', [$product_type->id]) }}">
                                        <i class="fa fa-edit"></i> Editar
                                    </a>
                                    <a class="btn btn-danger btn-xs" href="#" data-toggle="modal" data-target="#deleteModal" data-action="{{ route('product_type.destroy', [$product_type->id]) }}">
                                        <i class="fa fa-trash"></i> Borrar
                                    </a>
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
        {{ $product_types->links() }}
    </div>
</div>

@include('includes.modals.delete', ['entityText' => 'tipo de producto'])

@endsection
