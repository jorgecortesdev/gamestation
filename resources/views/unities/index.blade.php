@extends('layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="page-title">
                    <div class="title_left">
                        <h3><i class="fa fa-list-ul"></i> Unidades</h3>
                    </div>
                    <div class="title_right">
                        <a href="{{ route('unity.create') }}" class="btn btn-default pull-right">
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
                        <h2>Listado de unidades</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p>Catálogo de unidades registrados en el sistema.</p>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($unities as $unity)
                                    <tr>
                                        <td class="text-right">{{ $unity->id }}</td>
                                        <td>{{ $unity->name }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('unity.edit', [$unity->id]) }}"><i class="fa fa-edit"></i> Editar</a>
                                            &nbsp;|&nbsp;
                                            <a href="#" data-toggle="modal" data-target="#deleteModal" data-action="{{ route('unity.destroy', [$unity->id]) }}">
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
            <div class="col-md-6 col-sm-6 col-xs-12 text-center">
                {{ $unities->links() }}
            </div>
        </div>
    </div>
    <!-- /page content -->

    <!-- Modal -->
    @include('modals.delete', ['entityText' => 'unidad'])
    @include('includes.footer')
@endsection
