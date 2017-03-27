@extends('layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="page-title">
                    <div class="title_left">
                        <h3><i class="fa fa-child"></i> Niños</h3>
                    </div>
                    <div class="title_right">
                        <a href="{{ route('kid.create') }}" class="btn btn-default pull-right">
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
                        <h2>Listado de niños</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p>Niños registrados en el sistema.</p>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Padres</th>
                                    <th class="text-center">Cumpleaños</th>
                                    <th class="text-center">Sexo</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kids as $kid)
                                    <tr>
                                        <td class="text-right">{{ $kid->id }}</td>
                                        <td><a href="#">{{ $kid->name }}</a></td>
                                        <td class="text-center">{{ $kid->present()->parents }}</td>
                                        <td class="text-center">{{ $kid->present()->birthday_at }}</td>
                                        <td class="text-center">
                                            {{ $kid->present()->sex }}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('kid.edit', [$kid->id]) }}"><i class="fa fa-edit"></i> Editar</a>
                                            &nbsp;|&nbsp;
                                            <a href="#" data-toggle="modal" data-target="#deleteModal" data-action="{{ route('kid.destroy', [$kid->id]) }}"> <i class="fa fa-trash"></i> Borrar</a>
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
                {{ $kids->links() }}
            </div>
        </div>
    </div>
    <!-- /page content -->

    <!-- Modal -->
    @include('modals.delete', ['entityText' => 'niño'])

    <!-- footer content -->
    @include('includes.footer')
    <!-- /footer content -->
@endsection
