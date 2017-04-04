@extends('layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="page-title">
                    <div class="title_left">
                        <h3><i class="fa fa-users"></i> Usuarios</h3>
                    </div>
                    <div class="title_right">
                        <a href="#" class="btn btn-default pull-right">
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
                        <h2>Listado de usuarios</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p>Lista de usuarios autorizados en el sistema.</p>
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Correo</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="text-right">{{ $user->id }}</td>
                                        <td>
                                            {{ $user->name }}
                                            <br>
                                            <small>Creado {{ $user->created_at->format('d.m.Y') }}</small>
                                        </td>
                                        <td class="text-center">{{ $user->email }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-info btn-xs" href="#"><i class="fa fa-edit"></i> Editar</a>
                                            &nbsp;|&nbsp;
                                            <a class="btn btn-danger btn-xs" href="#"> <i class="fa fa-trash"></i> Borrar</a>
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
                {{ $users->links() }}
            </div>
        </div>
    </div>
    <!-- /page content -->

    <!-- footer content -->
    @include('includes.footer')
    <!-- /footer content -->
@endsection
