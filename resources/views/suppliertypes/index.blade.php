@extends('layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

        <div class="page-title">
            <div class="title_left">
                <h3>Catálogo de Proveedores</h3>
            </div>
            <div class="title_right">
                <a href="#" class="btn btn-default pull-right">Agregar</a>
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
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($supplier_types as $supplier_type)
                                    <tr>
                                        <td>{{ $supplier_type->id }}</td>
                                        <td>{{ $supplier_type->name }}</td>
                                        <td class="text-center">
                                            <a href="#"><i class="fa fa-eye"></i> Ver</a>
                                            &nbsp;|&nbsp;
                                            <a href="#"><i class="fa fa-edit"></i> Editar</a>
                                            &nbsp;|&nbsp;
                                            <a href="#"> <i class="fa fa-trash"></i> Borrar</a>
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
                {{ $supplier_types->links() }}
            </div>
        </div>
    </div>
    <!-- /page content -->

    <!-- footer content -->
    <footer>
        <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
        </div>
        <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->

@endsection
