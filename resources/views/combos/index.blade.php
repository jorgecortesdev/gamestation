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
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Color</th>
                                    <th class="text-center">Costo</th>
                                    <th class="text-center">Costo Unitario</th>
                                    <th class="text-center">Márgen de contribución</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($combos as $combo)
                                    <tr>
                                        <td>{{ $combo->id }}</td>
                                        <td><a href="{{ route('combo.show', [$combo->id]) }}">{{ $combo->name }}</a></td>
                                        <td>
                                            <div class="combo-color combo-color-bg-{{ $combo->google_color_id }} center-block"></div>
                                        </td>
                                        <td class="text-right">{{ $combo->present()->total }}</td>
                                        <td class="text-right">{{ $combo->present()->price }}</td>
                                        <td class="text-right">{{ $combo->present()->contribution_margin }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('combo.show', [$combo->id]) }}"><i class="fa fa-eye"></i> Ver</a>
                                            &nbsp;|&nbsp;
                                            <a href="{{ route('combo.edit', [$combo->id]) }}"><i class="fa fa-edit"></i> Editar</a>
                                            &nbsp;|&nbsp;
                                            <a href="#" data-toggle="modal" data-target="#deleteModal" data-action="{{ route('combo.destroy', [$combo->id]) }}"> <i class="fa fa-trash"></i> Borrar</a>
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
