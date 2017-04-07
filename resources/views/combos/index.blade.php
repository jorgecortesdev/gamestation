@extends('layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="page-title">
                    <div class="title_left">
                        <h3><i class="fa fa-gift"></i> Paquetes</h3>
                    </div>
                    <div class="title_right">
                        <a href="{{ route('combo.create') }}" class="btn btn-default pull-right">
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
                        <h2>Listado de paquetes</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p>Para agregar productos de proveedores el paquete deberá existir previamente.</p>
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Color</th>
                                    <th class="text-center">Horas</th>
                                    <th class="text-center">Niños</th>
                                    <th class="text-center">Adultos</th>
                                    <th class="text-center">Costo</th>
                                    <th class="text-center">Costo Unitario</th>
                                    <th class="text-center">Márgen de contribución</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($combos as $combo)
                                    <tr>
                                        <td class="text-right">{{ $combo->id }}</td>
                                        <td>
                                            <a href="{{ route('combo.show', [$combo->id]) }}">{{ $combo->name }}</a>
                                            <br>
                                            <small>Creado {{ $combo->present()->createdAt }}</small>
                                        </td>
                                        <td>
                                            <div class="combo-color combo-color-bg-{{ $combo->google_color_id }} center-block"></div>
                                        </td>
                                        <td class="text-center">{{ $combo->hours }}</td>
                                        <td class="text-center">{{ $combo->kids }}</td>
                                        <td class="text-center">{{ $combo->adults }}</td>
                                        <td class="text-right">{{ $combo->present()->total }}</td>
                                        <td class="text-right">{{ $combo->present()->price }}</td>
                                        <td class="text-right">{!! $combo->present()->contribution_margin !!}</td>
                                        <td class="text-center">
                                            <a class="btn btn-primary btn-xs" href="{{ route('combo.show', [$combo->id]) }}"><i class="fa fa-folder"></i> Ver</a>
                                            <a class="btn btn-info btn-xs" href="{{ route('combo.edit', [$combo->id]) }}"><i class="fa fa-edit"></i> Editar</a>
                                            <a class="btn btn-danger btn-xs" href="#" data-toggle="modal" data-target="#deleteModal" data-action="{{ route('combo.destroy', [$combo->id]) }}"> <i class="fa fa-trash"></i> Borrar</a>
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
                {{ $combos->links() }}
            </div>
        </div>
    </div>
    <!-- /page content -->

    <!-- Modal -->
    @include('modals.delete', ['entityText' => 'paquete'])

    <!-- footer content -->
    @include('includes.footer')
    <!-- /footer content -->
@endsection
