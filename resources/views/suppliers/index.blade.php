@extends('layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="page-title">
                    <div class="title_left">
                        <h3><i class="fa fa-truck"></i> Proveedores</h3>
                    </div>
                    <div class="title_right">
                        <a href="{{ route('supplier.create') }}" class="btn btn-default pull-right">
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
                        <h2>Listado de proveedores</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p>Proveedores registrados en el sistema.</p>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Dirección</th>
                                    <th class="text-center">Teléfono</th>
                                    <th class="text-center">Correo</th>
                                    <th class="text-center">Tipo</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($suppliers as $supplier)
                                    <tr>
                                        <td>{{ $supplier->id }}</td>
                                        <td><a href="{{ route('supplier.show', [$supplier->id]) }}">{{ $supplier->name }}</a></td>
                                        <td>{{ $supplier->address }}</td>
                                        <td class="text-center">{{ $supplier->present()->telephone }}</td>
                                        <td class="text-center">{{ $supplier->present()->email }}</td>
                                        <td class="text-center">{{ $supplier->type->name }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('supplier.edit', [$supplier->id]) }}"><i class="fa fa-edit"></i> Editar</a>
                                            &nbsp;|&nbsp;
                                            <a href="#" data-toggle="modal" data-target="#deleteModal" data-action="{{ route('supplier.destroy', [$supplier->id]) }}"> <i class="fa fa-trash"></i> Borrar</a>
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
                {{ $suppliers->links() }}
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
