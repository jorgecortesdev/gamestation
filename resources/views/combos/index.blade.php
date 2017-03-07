@extends('layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Paquetes</h3>
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
                    <div class="x_content">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Costo</th>
                                    <th>Color</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($combos as $combo)
                                    <tr>
                                        <td>{{ $combo->id }}</td>
                                        <td>{{ $combo->name }}</td>
                                        <td>{{ $combo->present()->price }}</td>
                                        <td class="prod_color combo"><div class="combo-color color bg-{{ $combo->color }}"></div></td>
                                        <td class="text-right">
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
